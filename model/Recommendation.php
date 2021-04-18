<?php 



class Recommendation{
    protected string $id;
    protected string $recommendation;

    public function _construct(){

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRecommendation(): string
    {
        return $this->recommendation;
    }


}
