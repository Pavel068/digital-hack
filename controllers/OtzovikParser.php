<?php

namespace app\controllers;

class OtzovikParser
{
    private
        $url,
        $client,
        $keyword,
        $currentPage,
        $blocks;

    public function __construct($keyword)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->url = 'https://otzovik.com/reviews';
        $this->keyword = $keyword;
        $this->currentPage = 1;
        $this->blocks = [
            'ts' => '.review-postdate > .tooltip-right',
            'msg' => '.review-teaser',
            'positive' => '.review-plus',
            'negative' => '.review-minus'
        ];
    }

    public function paginate($page)
    {
        $this->currentPage = $page;
    }

    private function loadPage()
    {
        $url = $this->url . '/' . $this->keyword . '/' . $this->currentPage;
        $response = $this->client->request('GET', $url, [
            'headers' => [
                'upgrade-insecure-requests' => 1,
                'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/74.0.3729.169 Chrome/74.0.3729.169 Safari/537.36',
                'cookie' => 'refreg=https%3A%2F%2Fwww.google.ru%2F; coo=1; ROBINBOBIN=gbpndpf3hap1vc8muhuc694f15; ssid=2476278565'
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return (string)$response->getBody();
        } else {
            return false;
        }
    }

    public function parse()
    {
        $page = $this->loadPage();

        if ($page) {
            $response = [];
            foreach ($this->blocks as $key => $value) {
                $resp = [];
                $doc = \phpQuery::newDocument($page)->find($value);
                foreach ($doc as $b) {
                    if ($key == 'ts') {
                        $resp[] = date("Y-m-d H:i:s", strtotime($b->textContent));
                    } else {
                        $resp[] = $b->textContent;
                    }
                }

                $response[] = $resp;
            }

            $this->writeDb($response);

            sleep(rand(3, 7));

            $this->currentPage++;
            $this->parse();
        } else {
            return false;
        }
    }

    protected function writeDb($parsedData)
    {
        $formattedData = [];

        for ($i = 0; $i < count($parsedData[0]); $i++) {
            $formattedData[] = [
                $parsedData[0][$i],
                $parsedData[1][$i],
                $parsedData[2][$i],
                $parsedData[3][$i],
            ];
        }

        \Yii::$app->db->createCommand()
            ->batchInsert('parsed_data', ['ts', 'msg', 'positive', 'negative'], $formattedData)
            ->execute();
    }
}