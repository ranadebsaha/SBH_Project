<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('frontend/style.css')}}">
    <title>Registration Form</title>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container" id="registrationForm">
                    <h2 class="text-center">Registration Form</h2>
                    <form method="post" action="{{url('/advocate_register')}}">
                    @csrf
                        <div class="form-group">
                            <label for="registerName">Institute Full Fame</label>
                            <input type="text" name="name" class="form-control" id="registerName" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="register">Institute Id</label>
                            <input type="text" name="address" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Institute Id" required>
                            </div>
                            <div class="form-group">
                                <label for="register">Institute Address</label>
                                <input type="text" name="address" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                    placeholder="Enter address" required>
                            </div>
                        <div class="form-group">
                            <label for="registerPhone">Phone number</label>
                            <input type="number" name="contact_no"class="form-control" id="registerPhone"
                                placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Enter email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="registerPassword" placeholder="Password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="" href="{{url('frontend/script.js')}}"></script>
</body>

</html>