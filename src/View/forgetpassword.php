<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
                <form action="/login?action=forget&act=forget_action" class="login-form" method="post">
                <!-- /cart?action=cart&act=update_cart -->
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Enter Email Address To Send Password
                            Link</label>
                        <input type="text" class="form-control" name="email" placeholder="">

                    </div>



                    <div class="form-check">
                        <input type="submit" name="submit_email">

                    </div>

                </form>
                </br>
                <div class="copy-text">Thecoffeehouse <i class="fa fa-heart"></i> <a
                        href="https://thecoffeehouse.com/">thecoffeehouse.com</a></div>
            </div>

        </div>
</section>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4; 

    .login-block {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh; 
    }

    .login-sec {
        max-width: 400px; 
        padding: 40px; 
        border-radius: 10px; 
        background: #ffffff;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 25px; 
    }

    .form-group label {
        font-size: 18px; 
        display: block; 
        margin-bottom: 8px; 
    }

    .form-control {
        font-size: 16px; 
        padding: 12px;
        box-sizing: border-box; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
    }

    .input-group {
        margin-bottom: 20px; 
    }

    .input-group-append {
        margin-left: 10px;
    }
  }
</style>

