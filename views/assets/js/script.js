$(document).ready(function(){
    $('.chosen-select').chosen();

    if( $('#signup-timezone-select') ){
        // Guess timezone
        var tz = moment.tz.guess();
        $('#signup-timezone-select option').each(function(){

            if( $(this).val() == tz ){
                $(this).prop('selected', true);
            }
        });
        $('#signup-timezone-select').chosen();
    }

    $('.business-display').on('click', '.delete-btn', function(){

        if( !confirm('Are you sure you want to delete this?') ){
            return false;
        }

        $businessPost = $(this).closest('.business-display').find('.businessPost');

        var business_id = $(this).closest('.business-display-field').attr('data-businessID');

        $(this).closest('.business-display').remove();


        $.post('/businesses/delete.php', {"business_id":business_id},function(data){

            console.log(data);

            $businesPost.text(business_data.business_post);
        });

    });


    $('#show-business-form-btn').click(function(){
        $('#add-business-form').toggle();
    });



    $('#province-select-dropdown').on('change', function(){
        var prCode = $(this).val();

        $('#cities-dropdowns').html('');

        var citiesSelectDropdownHtml = '<select class="form-control city-dropdowns" name="city" required>';

        $.each(GBcitiesArr[prCode], function(key, city){
            citiesSelectDropdownHtml += '<option>'+city+'</option>';
        });

        citiesSelectDropdownHtml += '</select>';
        $('#cities-dropdowns').html(citiesSelectDropdownHtml);
    });


    $('.business-display').on('submit', '.review-form', function(e){
        e.preventDefault();

        //Components
        var $reviewForm = $(this);
        var $businessPost = $(this).closest('.business-post');
        var $reviewLoop = $businessPost.find('.review-loop');

        var formdata = $(this).serialize();
        $reviewForm[0].reset();
        $.post('/reviews/add.php', formdata, function(data){
            console.log(data);
            var review_data=JSON.parse(data);
            $reviewLoop.html('');
            var reviewLoophtml='';
            $.each(review_data.reviews, function(key, review){
                reviewLoophtml += '<div class="business-review">';
                    reviewLoophtml += '<p>';
                        reviewLoophtml += '<span class="font-weight-bold review-persons-name">'+review.persons_name+'</span><br> '+review.review;
                    reviewLoophtml += '</p>';
                reviewLoophtml += '</div><!-- .business-review. -->';


            });
            $reviewLoop.html(reviewLoophtml);
        })

    });

    $('#review-feed').on('click', '.delete-review-btn', function(){

        $reviewCount = $(this).closest('.business-post').find('.review-count');
        //Values
        var review_id = $(this).attr('data-reviewID');
        var review_id = $(this).closest('review_post').attr('data-businessID');

        $(this).closest('.user-review').remove();

        $.post('/busineses/delete.php', {"review_id":review_id},
        function(review_data){
            console.log(review_data);

            $reviewCount.text(review_data.comment_count);

        });

    });

$('#search-input').keyup(function(){

    var searchData = $('#search-input').val();

    $.post('/businesses/search.php', {"search":searchData}, function(data){
        console.log(data);
        $('#business-display').html('');

        var businesses = JSON.parse(data);

        var businessesHTML = '';

        $.each(businesses, function(key, business){

            businessesHTML += '<div class="business-post col-md-6" data-businessID="'+business.id+'">';

            if( business.filename ){
                businessesHTML += '<img class="img-fluid" src="/assets/files/'+business.filename+'">';
            }else{
                businessesHTML += '<img class="img-fluid" src="/assets/images/default-business-photo.jpg">';
            }
                businessesHTML += '<div class="business-listing">';
                    businessesHTML += '<h3>'+business.name+'</h3>';
                    businessesHTML += '<p>';
                        businessesHTML += business.address+'<br>';
                        businessesHTML += business.city+'<br>';
                        businessesHTML += business.province+'<br>';
                        businessesHTML += business.postal_code+'<br>';
                        businessesHTML += business.phone_number+'<br>';
                        businessesHTML += business.email+'<br>';
                        businessesHTML += '<a href="'+business.website+'">'+business.website+'</a>';
                    businessesHTML += '</p>';
                businessesHTML += '</div>';
                businessesHTML += '<div class="review-loop">';


                $.each(business.reviews, function(key, review){
                    businessesHTML += '<div class="business-review">';
                        businessesHTML += '<p>';
                            businessesHTML += '<span class="font-weight-bold review-persons-name">'+review.persons_name+'</span>'+review.review+'';
                        businessesHTML += '</p>';
                    businessesHTML += '</div><!-- .business-review. -->';
                });

                businessesHTML += '</div><!-- .review-loop -->';
                businessesHTML += '<form class="review-form" method="post">';
                    businessesHTML += '<div class="form-group">';
                        businessesHTML += '<input type="hidden" name="business_id" value="'+business.id+'" required>';
                        businessesHTML += '<label>Leave a Review</label>';
                        businessesHTML += '<input class="form-control reviewForm-persons-name-field" type="text" name="persons_name" placeholder="your name" required>';
                    businessesHTML += '</div>';
                    businessesHTML += '<div class="form-group">';

                        businessesHTML += '<textarea class="form-control reviewForm-review-field" name="review" placeholder="Write a review ...." required></textarea>';
                    businessesHTML += '</div>';
                    businessesHTML += '<input class="btn btn-primary mb-3" type="submit" value="Submit">';
                businessesHTML += '</form>';
            businessesHTML += '</div><!-- .col-md-6 -->';

        });

        $('#business-display').html(businessesHTML);

    });



});









}); // END DOCUMENT READY

function previewFile() {

    var preview = document.getElementById('img-preview');
    var file = document.getElementById('file-with-preview').files[0];

    var reader = new FileReader();

    reader.onloadend = function(){
        preview.src = reader.result;
    }

    if(file) {
        reader.readAsDataURL(file);
    }else{
        preview.src = "";
    }

}
