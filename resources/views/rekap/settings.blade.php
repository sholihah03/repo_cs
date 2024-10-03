@extends('rekap.includes.master')
@section('title', 'rincian')

@section('content')
<style>
  #editProfileModal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 50;
}

</style>
<div class="w-full px-6 mx-auto">
  <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('{{ asset('soft/build/assets/img/curved-images/curved0.jpg') }}'); background-position-y: 50%">
    <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
  </div>
  <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-auto max-w-full px-3">
        <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
          <img src="{{asset('soft/build/assets/img/bruce-mars.jpg')}}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
        </div>
      </div>
      <div class="flex-none w-auto max-w-full px-3 my-auto">
        <div class="h-full">
          <h5 class="mb-1">Alec Thompson</h5>
          <p class="mb-0 font-semibold leading-normal text-sm">CEO / Co-Founder</p>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
        <div class="relative right-0">
          <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills role="tablist">
            <li class="z-30 flex-auto text-center">
              <a class="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link active href="javascript:;" role="tab" aria-selected="true">
                <span class="ml-1">App</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a class="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                <span class="ml-1">Messages</span>
              </a>
            </li>
            <li class="z-30 flex-auto text-center">
              <a class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                <span class="ml-1">Settings</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="w-full p-6 mx-auto">
    <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
      <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
          <div class="flex flex-wrap -mx-3">
            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
              <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
              <a href="javascript:;" data-target="tooltip_trigger" data-placement="top">
                <i class="leading-normal fas fa-user-edit text-sm text-slate-400"></i>
              </a>
              <div data-target="tooltip" class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm" role="tooltip">
                Edit Profile
                <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-auto p-4">
          <p class="leading-normal text-sm">Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).</p>
          <hr class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
            <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Full Name:</strong> &nbsp; Alec M. Thompson</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Email:</strong> &nbsp; alecthompson@mail.com</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Location:</strong> &nbsp; USA</li>
            <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
              <strong class="leading-normal text-sm text-slate-700">Social:</strong> &nbsp;
              <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none" href="javascript:;">
                <i class="fab fa-facebook fa-lg"></i>
              </a>
              <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600" href="javascript:;">
                <i class="fab fa-twitter fa-lg"></i>
              </a>
              <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900" href="javascript:;">
                <i class="fab fa-instagram fa-lg"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit Profile Modal -->
<!-- Modal Structure -->
<div id="editProfileModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
  <div class="bg-white p-6 rounded-lg shadow-lg">
    <h2>Edit Profile</h2>
    <form id="editProfileForm">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" placeholder="Alec Thompson" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="alecthompson@mail.com" required>
      </div>
      <div class="flex justify-end">
        <button type="button" class="bg-gray-300 text-gray-700 rounded-md px-4 py-2 mr-2" onclick="closeModal()">Cancel</button>
        <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Save</button>
      </div>
    </form>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const editProfileButton = document.querySelector('[data-target="tooltip_trigger"]');
    const modal = document.getElementById('editProfileModal');
    
    if (editProfileButton) {
      editProfileButton.addEventListener('click', function () {
        console.log('Edit button clicked'); // Debug message
        modal.classList.remove('hidden');
      });
    } else {
      console.log('Edit button not found'); // Debug message
    }
    
    window.closeModal = function () {
  console.log('Modal is closing'); // Debug message
  modal.classList.add('hidden');
};
  });
</script>
@endsection
