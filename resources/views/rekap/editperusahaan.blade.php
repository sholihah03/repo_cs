@extends('rekap.includes.master')
@section('title', 'informasi')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->
  <div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 xl:w-4/12">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
            <h6 class="mb-0">Platform Settings</h6>
          </div>
          <div class="flex-auto p-4">
            <h6 class="font-bold leading-tight uppercase text-xs text-slate-500">Account</h6>
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <li class="relative block px-0 py-2 bg-white border-0 rounded-t-lg text-inherit">
                <div class="min-h-6 mb-0.5 block pl-0">
                  <input id="follow" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" " checked />
                  <label for="follow" class="w-4/5 mb-0 ml-4 overflow-hidden font-normal cursor-pointer select-none text-sm text-ellipsis whitespace-nowrap text-slate-500" for="flexSwitchCheckDefault">Email me when someone follows me</label>
                </div>
              </li>
              <li class="relative block px-0 py-2 bg-white border-0 text-inherit">
                <div class="min-h-6 mb-0.5 block pl-0">
                  <input id="answer" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" />
                  <label for="answer" class="w-4/5 mb-0 ml-4 overflow-hidden font-normal cursor-pointer select-none text-sm text-ellipsis whitespace-nowrap text-slate-500" for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
                </div>
              </li>
              <li class="relative block px-0 py-2 bg-white border-0 rounded-b-lg text-inherit">
                <div class="min-h-6 mb-0.5 block pl-0">
                  <input id="mention" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" checked />
                  <label for="mention" class="w-4/5 mb-0 ml-4 overflow-hidden font-normal cursor-pointer select-none text-sm text-ellipsis whitespace-nowrap text-slate-500" for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                </div>
              </li>
            </ul>
            <h6 class="mt-6 font-bold leading-tight uppercase text-xs text-slate-500">Application</h6>
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <li class="relative block px-0 py-2 bg-white border-0 rounded-t-lg text-inherit">
                <div class="min-h-6 mb-0.5 block pl-0">
                  <input id="launches projects" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" />
                  <label for="launches projects" class="w-4/5 mb-0 ml-4 overflow-hidden font-normal cursor-pointer select-none text-sm text-ellipsis whitespace-nowrap text-slate-500" for="flexSwitchCheckDefault3">New launches and projects</label>
                </div>
              </li>
              <li class="relative block px-0 py-2 bg-white border-0 text-inherit">
                <div class="min-h-6 mb-0.5 block pl-0">
                  <input id="product updates" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" checked />
                  <label for="product updates" class="w-4/5 mb-0 ml-4 overflow-hidden font-normal cursor-pointer select-none text-sm text-ellipsis whitespace-nowrap text-slate-500" for="flexSwitchCheckDefault4">Monthly product updates</label>
                </div>
              </li>
              <li class="relative block px-0 py-2 pb-0 bg-white border-0 rounded-b-lg text-inherit">
                <div class="min-h-6 mb-0.5 block pl-0">
                  <input id="subscribe" class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" />
                  <label for="subscribe" class="w-4/5 mb-0 ml-4 overflow-hidden font-normal cursor-pointer select-none text-sm text-ellipsis whitespace-nowrap text-slate-500" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
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
      <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
            <h6 class="mb-0">Conversations</h6>
          </div>
          <div class="flex-auto p-4">
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 rounded-t-lg text-inherit">
                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                  <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                </div>
                <div class="flex flex-col items-start justify-center">
                  <h6 class="mb-0 leading-normal text-sm">Sophie B.</h6>
                  <p class="mb-0 leading-tight text-xs">Hi! I need more information..</p>
                </div>
                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
              </li>
              <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                  <img src="../assets/img/marie.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                </div>
                <div class="flex flex-col items-start justify-center">
                  <h6 class="mb-0 leading-normal text-sm">Anne Marie</h6>
                  <p class="mb-0 leading-tight text-xs">Awesome work, can you..</p>
                </div>
                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
              </li>
              <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                  <img src="../assets/img/ivana-square.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                </div>
                <div class="flex flex-col items-start justify-center">
                  <h6 class="mb-0 leading-normal text-sm">Ivanna</h6>
                  <p class="mb-0 leading-tight text-xs">About files I can..</p>
                </div>
                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
              </li>
              <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                  <img src="../assets/img/team-4.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                </div>
                <div class="flex flex-col items-start justify-center">
                  <h6 class="mb-0 leading-normal text-sm">Peterson</h6>
                  <p class="mb-0 leading-tight text-xs">Have a great afternoon..</p>
                </div>
                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
              </li>
              <li class="relative flex items-center px-0 py-2 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                  <img src="../assets/img/team-3.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                </div>
                <div class="flex flex-col items-start justify-center">
                  <h6 class="mb-0 leading-normal text-sm">Nick Daniel</h6>
                  <p class="mb-0 leading-tight text-xs">Hi! I need more information..</p>
                </div>
                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
          <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
              <h6 class="mb-0">Billing Information</h6>
            </div>
            <div class="flex-auto p-4 pt-6">
              <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                  <div class="flex flex-col">
                    <h6 class="mb-4 leading-normal text-sm">Oliver Liam</h6>
                    <span class="mb-2 leading-tight text-xs">Company Name: <span class="font-semibold text-slate-700 sm:ml-2">Viking Burrito</span></span>
                    <span class="mb-2 leading-tight text-xs">Email Address: <span class="font-semibold text-slate-700 sm:ml-2">oliver@burrito.com</span></span>
                    <span class="leading-tight text-xs">VAT Number: <span class="font-semibold text-slate-700 sm:ml-2">FRB1235476</span></span>
                  </div>
                  <div class="ml-auto text-right">
                    <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a>
                    <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
                <li class="relative flex p-6 mt-4 mb-2 border-0 rounded-xl bg-gray-50">
                  <div class="flex flex-col">
                    <h6 class="mb-4 leading-normal text-sm">Lucas Harper</h6>
                    <span class="mb-2 leading-tight text-xs">Company Name: <span class="font-semibold text-slate-700 sm:ml-2">Stone Tech Zone</span></span>
                    <span class="mb-2 leading-tight text-xs">Email Address: <span class="font-semibold text-slate-700 sm:ml-2">lucas@stone-tech.com</span></span>
                    <span class="leading-tight text-xs">VAT Number: <span class="font-semibold text-slate-700 sm:ml-2">FRB1235476</span></span>
                  </div>
                  <div class="ml-auto text-right">
                    <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a>
                    <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
                <li class="relative flex p-6 mt-4 mb-2 border-0 rounded-b-inherit rounded-xl bg-gray-50">
                  <div class="flex flex-col">
                    <h6 class="mb-4 leading-normal text-sm">Ethan James</h6>
                    <span class="mb-2 leading-tight text-xs">Company Name: <span class="font-semibold text-slate-700 sm:ml-2">Fiber Notion</span></span>
                    <span class="mb-2 leading-tight text-xs">Email Address: <span class="font-semibold text-slate-700 sm:ml-2">ethan@fiber.com</span></span>
                    <span class="leading-tight text-xs">VAT Number: <span class="font-semibold text-slate-700 sm:ml-2">FRB1235476</span></span>
                  </div>
                  <div class="ml-auto text-right">
                    <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a>
                    <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
          <div class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
              <div class="flex flex-wrap -mx-3">
                <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                  <h6 class="mb-0">Your Transactions</h6>
                </div>
                <div class="flex items-center justify-end max-w-full px-3 md:w-1/2 md:flex-none">
                  <i class="mr-2 far fa-calendar-alt"></i>
                  <small>23 - 30 March 2020</small>
                </div>
              </div>
            </div>
            <div class="flex-auto p-4 pt-6">
              <h6 class="mb-4 font-bold leading-tight uppercase text-xs text-slate-500">Newest</h6>
              <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                  <div class="flex items-center">
                    <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75"><i class="fas fa-arrow-down text-3xs"></i></button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 leading-normal text-sm text-slate-700">Netflix</h6>
                      <span class="leading-tight text-xs">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center">
                    <p class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-rose-400 text-sm bg-clip-text">- $ 2,500</p>
                  </div>
                </li>
                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                  <div class="flex items-center">
                    <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 leading-normal text-sm text-slate-700">Apple</h6>
                      <span class="leading-tight text-xs">27 March 2020, at 04:30 AM</span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center">
                    <p class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">+ $ 2,000</p>
                  </div>
                </li>
              </ul>
              <h6 class="my-4 font-bold leading-tight uppercase text-xs text-slate-500">Yesterday</h6>
              <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                  <div class="flex items-center">
                    <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 leading-normal text-sm text-slate-700">Stripe</h6>
                      <span class="leading-tight text-xs">26 March 2020, at 13:45 PM</span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center">
                    <p class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">+ $ 750</p>
                  </div>
                </li>
                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 text-inherit rounded-xl">
                  <div class="flex items-center">
                    <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 leading-normal text-sm text-slate-700">HubSpot</h6>
                      <span class="leading-tight text-xs">26 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center">
                    <p class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">+ $ 1,000</p>
                  </div>
                </li>
                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 text-inherit rounded-xl">
                  <div class="flex items-center">
                    <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i class="fas fa-arrow-up text-3xs"></i></button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 leading-normal text-sm text-slate-700">Creative Tim</h6>
                      <span class="leading-tight text-xs">26 March 2020, at 08:30 AM</span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center">
                    <p class="relative z-10 items-center inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">+ $ 2,500</p>
                  </div>
                </li>
                <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                  <div class="flex items-center">
                    <button class="leading-pro ease-soft-in text-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-slate-700 border-transparent bg-transparent text-center align-middle font-bold uppercase text-slate-700 transition-all hover:opacity-75"><i class="fas fa-exclamation text-3xs"></i></button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 leading-normal text-sm text-slate-700">Webflow</h6>
                      <span class="leading-tight text-xs">26 March 2020, at 05:00 AM</span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center">
                    <p class="flex items-center m-0 font-semibold leading-normal text-sm text-slate-700">Pending</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
              ©
              <script>
                document.write(new Date().getFullYear() + ",");
              </script>
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
            <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
<div fixed-plugin>
  <a fixed-plugin-button class="bottom-7.5 right-7.5 text-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
    <i class="py-2 pointer-events-none fa fa-cog"> </i>
  </a>
  <!-- -right-90 in loc de 0-->
  <div fixed-plugin-card class="z-sticky shadow-soft-3xl w-90 ease-soft -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200">
    <div class="px-6 pt-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
      <div class="float-left">
        <h5 class="mt-4 mb-0">Soft UI Configurator</h5>
        <p>See our dashboard options.</p>
      </div>
      <div class="float-right mt-6">
        <button fixed-plugin-close-button class="inline-block p-0 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 active:opacity-85 text-slate-700">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
    <div class="flex-auto p-6 pt-0 sm:pt-4">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)">
        <div class="my-2 text-left" sidenav-colors>
          <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-purple-700 to-pink-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" active-color data-color-from="purple-700" data-color-to="pink-500" onclick="sidebarColor(this)"></span>
          <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-gray-900 to-slate-800 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="gray-900" data-color-to="slate-800" onclick="sidebarColor(this)"></span>
          <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-blue-600 to-cyan-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="blue-600" data-color-to="cyan-400" onclick="sidebarColor(this)"></span>
          <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-green-600 to-lime-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="green-600" data-color-to="lime-400" onclick="sidebarColor(this)"></span>
          <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-500 to-yellow-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="red-500" data-color-to="yellow-400" onclick="sidebarColor(this)"></span>
          <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-600 to-rose-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="red-600" data-color-to="rose-400" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-4">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="leading-normal text-sm">Choose between 2 different sidenav types.</p>
      </div>
      <div class="flex">
        <button transparent-style-btn class="inline-block w-full px-4 py-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all border border-transparent border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 bg-fuchsia-500 hover:border-fuchsia-500" data-class="bg-transparent" active-style>Transparent</button>
        <button white-style-btn class="inline-block w-full px-4 py-3 mb-2 ml-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 border-fuchsia-500 bg-none text-fuchsia-500 hover:border-fuchsia-500" data-class="bg-white">White</button>
      </div>
      <p class="block mt-2 leading-normal text-sm xl:hidden">You can change the sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="mt-4">
        <h6 class="mb-0">Navbar Fixed</h6>
      </div>
      <div class="min-h-6 mb-0.5 block pl-0">
        <input class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" navbarFixed />
      </div>
      <hr class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent sm:my-6" />
      <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in hover:shadow-soft-xs hover:scale-102 active:opacity-85 tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800" href="https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" target="_blank">Free Download</a>
      <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 border-slate-700 text-slate-700 hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none" href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/" target="_blank">View documentation</a>
      <div class="w-full text-center">
        <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
        <h6 class="mt-4">Thank you for sharing!</h6>
        <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20Tailwind%20made%20by%20%40CreativeTim&hashtags=webdesign,dashboard,tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-tailwind" class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700" target="_blank"> <i class="mr-1 fab fa-twitter" aria-hidden="true"></i> Tweet </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700" target="_blank"> <i class="mr-1 fab fa-facebook-square" aria-hidden="true"></i> Share </a>
      </div>
    </div>
  </div>
</div>

  </div>
@endsection