<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World's Best Feedback Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            background-image: url('{{ asset('assets/images/img2.jpg') }}'); /* Replace with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Helvetica', Arial, sans-serif;
        }


        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 20px;
            transition: transform 0.2s;
        }
        /* .container:hover {
            transform: scale(1.03);
        } */
        .form-group label {
            font-weight: bold;
            color: #333; /* Darken label text color */
        }
        .form-control {
            background-color: 	#FFFAFA;
            border: 1px solid #ccc;
            color: #333;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.2s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .star-rating-container {
            display: flex;
            justify-content: center; /* Center-align horizontally */
            align-items: center; /* Center-align vertically */
            margin-bottom: 20px; /* Add some space below the stars */
        }
        .star-rating label {
            cursor: pointer;
            font-size: 32px; /* Make the stars larger */
            color: #ccc;
            transition: color 0.2s;
            margin: 0 10px; /* Add space between stars */
        }
        .star-rating input[type="radio"] {
            display: none; /* Hide the radio buttons */
        }
        .star-rating label.checked {
            color: #ffc107;
        }
        .star-rating label:hover {
            color: #ffac33;
        }
        .star-rating input[type="radio"]:checked ~ label {
            color: #ffc107;
        }
        textarea {
            background-color: #f8f8f8;
            color: #333;
            border: 1px solid #ccc;
            transition: border-color 0.2s;
        }
        textarea:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        h1 {
            text-align: center;
            color: #007bff;
            font-family: "Helvetica Neue", Helvetica;
            font-style: italic;
        }
        .form-description {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 18px;
            color: #666;
            font-style: italic; /* Make description italic */
        }
        select.form-control {
            appearance: none;
            background-image: url('https://cdn2.iconfinder.com/data/icons/essential-web-3/512/arrow-down-512.png');
            background-position: right center;
            background-repeat: no-repeat;
            background-size: 20px;
            padding-right: 30px;
        }
        select.form-control option {
            background-color: #fff;
        }
        
        /* Animation styles for opening and closing the form */
        @keyframes openForm {
            0% {
                width: 64px;
                height: 64px;
            }
            50% {
                width: 320px;
                height: 64px;
            }
            100% {
                width: 320px;
                height: 380px;
            }
        }

        /* ok message styles */
        .ok_message {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -32px;
            margin-top: -32px;
            width: 64px;
            height: 64px;
            background: #6C4A27;
            z-index: 100;
            transform: scale(0, 0) rotate(-90deg);
            transition: all 0.5s 0.3s cubic-bezier(.9, .1, .1, .9);
            line-height: 64px;
            text-align: center;
            cursor: pointer;
        }
        
        .ok_message span {
            text-transform: uppercase;
            font-size: 16px;
            color: #CB9A4B;
            opacity: 0;
            transform: scale(0.2, 0.2);
            transition: all 0.6s 0.4s ease;
        }
        
        .ok_message.active {
            width: 320px;
            margin-left: -160px;
            transform: scale(1, 1) rotate(0deg);
        }
        
        .ok_message span.active {
            opacity: 1;
            transform: scale(1, 1);
        }
    </style>
</head>
<body>
    <div class="container col-md-6 col-sm-12 col-lg-6 ">
        <h1>Feedback Form</h1>
        <p class="form-description">Share your valuable feedback with us!</p>
        <form method="POST" action="{{ route('feedback.submit') }}">
            @csrf
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
            <label>Your Rating:</label>
            <div class="form-group star-rating-container">
           
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" required>
                    <label for="star5">★</label>
                    <input type="radio" id="star4" name="rating" value="4" required>
                    <label for="star4">★</label>
                    <input type="radio" id="star3" name="rating" value="3" required>
                    <label for="star3">★</label>
                    <input type="radio" id="star2" name="rating" value="2" required>
                    <label for="star2">★</label>
                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1">★</label>
                </div>
            </div>
            </div>

            <div class="form-group">
                <label for="feedback">Valuable Feedback:</label>
                <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="others">Other Comments:</label>
                <textarea class="form-control" id="others" name="others" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="how_you_know">How Did You Hear About Us?</label>
                <select class="form-control" id="how_you_know" name="how_you_know">
                    <option value="Advertisement">Advertisement</option>
                    <option value="Friend">Friend</option>
                    <option value="Internet Search">Internet Search</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group text-center"> <!-- Center the button -->
                <button type="submit" class="btn btn-primary mt-3">Submit Feedback</button>
            </div>
            
        </form>
    </div>
    <!-- Include Bootstrap JS and jQuery here if not already included -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to show/hide the pop-up message
        $(".form").on('click', function(){
            $(this).addClass('active');
        });

        $(".submit").on('click', function() {
            $(this).parent().parent().hide(300);
            $(".ok_message").addClass("active");
        });

        $(".ok_message").on('click', function() {
            $(this).removeClass("active");
            $(".form").removeClass("active").show();
        });
    </script>
</body>
</html>
