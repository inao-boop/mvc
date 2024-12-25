<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign Up to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/regist" method="POST">
    <input name="csrf_token" value="<?= $_SESSION['csrf_token']?>" hidden>
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
        <div class="mt-2">
          <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
        </div>
        <div class="mt-2 flex relative">
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          <span id="pesanPassword" onclick="togglePassword()" class="material-symbols-outlined absolute right-2 top-2">
            visibility
          </span>
        </div>
      </div>
       

      <div>
        <label for="name" class="block text-sm/6 font-medium text-gray-900">Your Name</label>
        <div class="mt-2">
          <input type="text" name="name" id="name" autocomplete="name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <label for="telephone_no" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
        <div class="mt-2">
          <input type="text" name="telephone_no" id="telephone_no" autocomplete="telephone_no" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>


      <div>
    <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
    <div class="mt-2">
        <textarea name="address" id="address" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
    </div>
  </div>

      <div>
        <button type="submit" name="regist" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-gray-500">
        Have an account?
      <a href="login" class="font-semibold text-indigo-600 hover:text-indigo-500">Log in</a>
    </p>
  </div>
</div>

<script>
  function togglePassword(){
    const inputPassword = document.getElementById('password');
    const pesanPassword = document.getElementById('pesanPassword');
    if(inputPassword.type == 'text'){
      inputPassword.type = 'password';
      pesanPassword.innerHTML = `<span class="material-symbols-outlined"> visibility </span>`;
    }else{
      inputPassword.type = 'text';
      pesanPassword.innerHTML = `<span class="material-symbols-outlined"> visibility_off </span>`;
    }
  }
  
</script>