<?php
class VideoDetailsFormProvider {

    private $con;
    
    public function __construct($con) {
        $this->con = $con;
    }

    public function createUploadForms(){
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this->createPrivacyInput();
        $categoriesInput = $this->createCategoriesInput();
        $uploadButton = $this->createUploadButton();
        return "<form  action='processing.php' method='POST' enctype='multipart/form-data'>
                    $fileInput
                    $titleInput
                    $descriptionInput
                    $privacyInput
                    $categoriesInput
                    $uploadButton
                </form>";
    }

    public function createFileInput() {
        
        return '<div class="form-group">
                    <label for="formControlFile1">Your File</label>
                    <input type="file" class="form-control-file" id="formControlFile1" name="fileInput" required>
                </div>';
    }

    public function createTitleInput(){
        return '<div class="form-group">
                    <input class="form-control" type="text" placeholder="Title" name="titleInput">
                <div class="form-group">';
    }

    public function createDescriptionInput(){
        return '<div class="form-group">
                    <textarea class="form-control" placeholder="Description" name="descriptionInput" rows="3"></textarea>
                <div class="form-group">';
    }

    public function createPrivacyInput() {
        return '<div class="form-group">
                    <select class="form-control" name="privacyInput">
                        <option value="0">Private</option>
                        <option value="1">Public</option>
                    </select>
                </div>';
    }

    public function createCategoriesInput() {
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = '<div class="form-group">
                    <select class="form-control" name="categoriesInput">';

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= '<option value='.$row["id"].'>' . $row["name"] . '</option>';
        }

        $html .= '</select>
                    </div>';    
        return $html ;
    }

    public function createUploadButton() {
        return "<button type='submit' class='btn btn-primary' name='uploadButton'>Upload</button>";
    }

}
?>