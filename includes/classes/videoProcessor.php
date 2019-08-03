<?php
class VideoProcessor {

    private $con;

    private $sizeLimit = 1000000000;

    public function __construct($con) {
        $this->con = $con;
    }

    public function upload($videoUploadData) {
        $targetDir = "uploads/videos/";
        $videoData = $videoUploadData->videoDataArray;

        $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);

        $tempFilePath = str_replace(" ","_",$tempFilePath);

        $isValidData = $this->processVideo($videoData, $tempFilePath);

        if(!$isValidData) {
            return FALSE;
        }

        if(move_uploaded_file($videoData["tmp_name"], $tempFilePath)){
            
            $filePathDir = $tempFilePath . uniqid() . ".mp4";


            if($this->insertVideoData($videoData, $filePathDir)){

            }

        }
    }

    private function processVideo($videoData, $tempFilePath) {
        $videoType = pathInfo($tempFilePath, PATHINFO_EXTENSION);

        if(!$this->isValidSize($videoData)){
            echo "File size exceeds " . $this->sizeLimit . " bytes.";
            return False;
        }
        return TRUE;
    }

    private function isValidSize($videoData){
        return $videoData["size"] <= $this->sizeLimit;
    }

    private function insertVideoData($videoData, $filePathDir){
        
    }

}


?>