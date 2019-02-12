<?php
class Business extends Db {

    function search(){

        $search = $this->data['search'];

        $sql = "SELECT * FROM businesses WHERE name LIKE '%$search%'";

        $businesses = $this->select($sql);
        $r = new Review;

        foreach($businesses as $key => $business){

            $reviews = $r->get_all_by_business_id($business['id']);

            $businesses[$key]['reviews'] = $reviews;
        }

        return $businesses;

    }

    function get_all(){

        $sql = "SELECT * FROM businesses";

        $businesses = $this->select($sql);

        return $businesses;
    }

    function get_by_id($id){

        $id = (int)$id;

        $sql = "SELECT * FROM businesses WHERE id = '$id'";

        $business = $this->select($sql)[0];

        return $business;

    }

    function get_all_by_user_id($user_id){

        $user_id = (int)$user_id;

        $sql = "SELECT * FROM businesses WHERE user_id = '$user_id'";

        $business = $this->select($sql);

        return $business;

    }

    function add(){

        $util = new Util;
        $name = trim($this->data['name']);
        $address = trim($this->data['address']);
        $city = trim($this->data['city']);
        $province = trim($this->data['province']);
        $postal_code = trim($this->data['postal_code']);
        $phone_number = trim($this->data['phone_number']);
        $email = trim($this->data['email']);
        $website = trim($this->data['website']);
        $user_id = (int)$_SESSION['user_logged_in'];

        if( !empty($_FILES['fileToUpload']["name"]) ){ //  they submitted a file
            $file_upload = $util->file_upload();
            $filename = $file_upload['filename'];
            if( $file_upload['file_upload_error_status'] === 0 ){
                //File upload was successful

                $sql = "INSERT INTO businesses (name, address, city, province, postal_code, phone_number, email, website, user_id, filename) VALUES ('$name', '$address', '$city', '$province', '$postal_code', '$phone_number','$email', '$website', '$user_id', '$filename')";
                $this->execute($sql);
            }
        }else{ //  they didn't submit a file
            $sql = "INSERT INTO businesses (name, address, city, province, postal_code, phone_number, email, website, user_id) VALUES ('$name', '$address', '$city', '$province', '$postal_code', '$phone_number','$email', '$website', '$user_id')";
            $this->execute($sql);
        }


    }



    function edit($id){

        $id = (int)$id;
        $this->check_ownership($id); // Make sure user owns post that's being editted
        $name = trim($this->data['name']);
        $address = trim($this->data['address']);
        $city = trim($this->data['city']);
        $province = trim($this->data['province']);
        $postal_code = trim($this->data['postal_code']);
        $email = trim($this->data['email']);
        $website = trim($this->data['website']);
        $current_user_id = (int)$_SESSION['user_logged_in'];

        if( !empty($_FILES['fileToUpload']['name']) ){
            //Check if new file submitted

            $util = new Util;
            $file_upload = $util->file_upload(); //Upload new file
            $filename = $file_upload['filename'];

            if( $file_upload['file_upload_error_status'] === 0 ){
                //File upload was successful

                //Get old filenam from db db first
                $old_business_image = trim($this->get_by_id($id)['filename']);


                //Save Filename to
                $sql = "UPDATE businesses SET name='$name', address='$address', city='$city', province='$province', postal_code='$postal_code', email='$email', website='$website', filename='$filename' WHERE id='$id' AND user_id='$current_user_id'";

                $this->execute($sql);

                // Delete the old project image file_exists
                if( !empty($old_business_image) ){
                    if( file_exists(APP_ROOT.'/views/assets/files/'.$old_business_image)){
                        unlink( APP_ROOT.'/views/assets/files/'.$old_business_image);
                    }
                }

            }

        }else{ //if no new file was submitted

            $sql = "UPDATE businesses SET name='$name', address='$address', city='$city',  province='$province', postal_code='$postal_code', email='$email', website='$website' WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);
        }

    }

    function delete(){

        $current_user_id = (int)$_SESSION['user_logged_in'];
        $id = (int)$_GET['id'];
        $this->check_ownership($id);

        //Delete the old project image file
        $business_image = trim($this->get_by_id($id)['filename']);

        if( !empty($business_image) ){
            if( file_exists(APP_ROOT.'/views/assets/files/'.$business_image )){
                unlink(APP_ROOT.'/views/assets/files/'.$business_image);
            }
        }
        $sql = "DELETE FROM businesses WHERE id='$id' AND user_id='$current_user_id'";
        $this->execute($sql);

        $sql = "DELETE FROM reviews WHERE business_id='$id'";
        $this->execute($sql);

    }

    function check_ownership($id){

        $id = (int)$id;

        $sql = "SELECT * FROM businesses WHERE id = '$id'";

        $business = $this->select($sql)[0];

        if( $business['user_id'] == $_SESSION['user_logged_in'] ){
            return true;
        }else{
            header("Location: /");
            exit();
        }

    }


}
