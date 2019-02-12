<?php
class Review extends Db {

    function get_all_by_business_id($business_id){

        $business_id = (int)$business_id;

        // $sql="SELECT * FROM reviews WHERE business_id="$business_id'";

        $sql="SELECT * FROM reviews WHERE business_id='$business_id'";


        $all_business_reviews = $this->select($sql);
        return $all_business_reviews;
    }

    function add($review_data){

        $review = $this->data['review'];
        $business_id = $this->data['business_id'];
        $persons_name = $this->data['persons_name'];
        $posted_time = time();

        $sql = "INSERT INTO reviews (review, posted_time, business_id, persons_name) VALUES('$review', '$posted_time', '$business_id', '$persons_name')";

        $review_id = $this->execute_return_id($sql);

        if( !empty($review_id) ){
            $review_data['error'] = false;
        }

        $reviews=$this->get_all_by_business_id($business_id);
        $review_data['reviews']=$reviews;

        return $review_data;

    }
}
