<?php


namespace McaSpider;

use QL\QueryList;

class AreaSpider
{
    /**
     * @var string|null
     */
    public ?string $Url = '';

    /**
     * 区域码
     * @var string
     */
    public string $code = '';

    /**
     * 区域名称
     * @var string
     */
    public string $name = '';

    /**
     * 父级区域码
     * @var string
     */
    public string $parent = '';

    /**
     * AreaSpider constructor.
     * @param string|null $url
     */
    public function __construct(string $url = null)
    {
//        if ($url !== null) $this->Url = $url;
        $this->Url = $url;
    }

    public function SpiderMcaAreaArrayResult(array $rulesArray): array
    {
        return (new QueryList)->get($this->Url)->removeHead()->rules($rulesArray)->queryData();
    }
}
