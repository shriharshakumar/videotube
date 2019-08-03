<?php

class VideoUploadData {
    public $videoDataArray,
    $title,
    $description,
    $privacy,
    $category;

    public function __construct(
    $videoDataArray,
    $title,
    $description,
    $privacy,
    $category
    ){
        $this->videoDataArray=$videoDataArray;
        $this->title=$title;
        $this->description=$description;
        $this->privacy=$privacy;
        $this->category=$category;
    }

}

?>