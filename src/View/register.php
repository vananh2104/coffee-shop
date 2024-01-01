<style>
  .form {
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: auto;
    padding: 20px;
    width: 400px;
    margin: 0 auto;
  }

  .title {
    color: #eee;
    font-family: sans-serif;
    font-size: 36px;
    font-weight: 600;
  }

  .subtitle {
    text-align: center;
    color: #eee;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: 600;
  }

  .input-container {
    height: 40px;
    position: relative;
    width: 100%;
  }

  .ic1 {
    margin-top: 20px;
  }

  .ic2 {
    margin-top: 30px;
  }

  .input ,.form-select{
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 40px;
    outline: 0;
    padding: 4px 10px 0;
    width: 100%;
  }

  .cut {
    background-color: #15172b;
    border-radius: 10px;
    height: 10px;
    left: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 76px;
  }

  .cut-short {
    width: 30px;
  }

  .input:focus~.cut,
  .input:not(:placeholder-shown)~.cut {
    transform: translateY(8px);
  }

  .plh {
    color: #65657b;
    font-family: sans-serif;
    left: 20px;
    line-height: 14px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 20px;
  }

  .input:focus~.plh,
  .input:not(:placeholder-shown)~.plh {
    transform: translateY(-30px) translateX(10px) scale(0.75);
  }

  .input:not(:placeholder-shown)~.plh {
    color: #808097;
  }

  .input:focus~.plh {
    color: #dc2f55;
  }

  .submit {
    background-color: #08d;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    cursor: pointer;
    font-size: 18px;
    height: 50px;
    margin-top: 38px;
    text-align: center;
    width: 100%;
  }

  .submit:active {
    background-color: #06b;
  } 
  .ic3,.ic4,.ic5,.ic6,.ic7,.ic8 {
    margin-top: 30px;
  }
</style>
<!-- <form action="index.php?action=dangky&act=dangky_action" method="post" class="form" role="form"> -->
<form action="/register?action=register&act=dangky_action" method="post" class="form" role="form">
  <div class="subtitle">Sign up</div>
  
  <div class="input-container ic2">
    <input id="lastname" class="input" type="text" name="txtlname" placeholder="">
    <div class="cut"></div>
    <label for="lastname" class="plh">Last name</label>
</div>

  
  <div class="input-container ic1">
    <input id="firstname" class="input" type="text" name="txtfname" placeholder="">
    <div class="cut"></div>
    <label for="firstname" class="plh">First name *</label>
  </div>
<!--   
  <div class="input-container ic3">
    <input id="gender" class="input" type="text" name="txtgt" placeholder="">
    <div class="cut"></div>
    <label for="gender" class="plh">Gender</label>
  </div> -->
   
  <div class="input-container ic3">
  <label for="gender" class="plh">Gender *</label>
  <select id="gender" class="form-select" type="text" name="txtgt" placeholder="">
    <option selected></option>
    <option value="0">Nữ</option>
    <option value="1">Nam</option>
    <option value="2">không xác định</option>
  </select>
  <div class="cut"></div>
 
</div>
  <div class="input-container ic4">
    <input id="address" class="input" type="text" name="txtdc" placeholder="">
    <div class="cut"></div>
    <label for="address" class="plh">Address</label>
  </div> 
  <div class="input-container ic8">
    <input id="phoneNumber" class="input" type="text" name="txtsdt" placeholder="">
    <div class="cut cut-short"></div>
    <label for="phoneNumber" class="plh">Phone Number</label>
  </div> 
  <div class="input-container ic5">
    <input id="username" class="input" type="text" name="txtusername" placeholder="">
    <div class="cut"></div>
    <label for="username" class="plh">Username</label>
  </div> 
  <div class="input-container ic7">
    <input id="email" class="input" type="text" name="txtemail" placeholder="">
    <div class="cut"></div>
    <label for="email" class="plh">Email</label>
  </div>
  
  <div class="input-container ic6">
    <input id="password" class="input" type="password" name="txtpass" placeholder="">
    <div class="cut"></div>
    <label for="password" class="plh">Password *</label>
  </div>
  
  <div class="input-container ic6">
    <input id="confirmPassword" class="input" type="password" placeholder="">
    <div class="cut cut-short"></div>
    <label for="confirmPassword" class="plh">Confirm Password *   </label>
  </div>
  
  <button type="submit" class="submit" name="submit">Sign up</button>
</form>