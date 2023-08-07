<?php $__env->startSection('content'); ?>
<div class="mx-auto min-h-screen">
    <div class="flex flex-wrap p-[1rem] md:p-[5rem] lg:p-[5rem]">

        <div class="w-full min-h-[80vh] flx flex-col m-5 rounded-3xl ">
            <div class="card p-10 rounded-3xl drop-shadow-xl overflow-hidden flex-1 flex flex-col items-center">

                <!-- FileInfo  -->
                <div id="fileInfoBox" class="bg-[#346CFB] flow-root hide w-full sm:w-full md:w-1/4 lg:w-1/4  m-5 card p-10 rounded-lg drop-shadow-3xl overflow-hidden items-center ">
                    <div class="float-left mr-10">
                        <h3 id="inputFileName" class="text-3xl font-bold text-white"></h3>
                        <p id="inputFileSize" class="text-lg text-white"></p>
                    </div>
                    <div class="float-right">
                        <button id="removeInputFileButton" class="btn btn-circle mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form  -->
                <form id="audioUploadForm" method="POST" enctype="multipart/form-data" class="m-5 items-center w-full sm:w-full md:w-1/4 lg:w-1/4 ">
                    <div id="uploadArea">
                        <label class="bg-white hover:bg-green-200 border-dotted border-2 border-black items-center flex justify-center  h-32 px-4 transition rounded-md cursor-pointer">
                            <span class="flex justify-center items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>

                                <span class="font-medium text-white-600">
                                    Drop files to Attach, or
                                    <span class="">browse</span>
                                </span>
                            </span>
                            <input type="file" class="" id="file" accept="audio/*" hidden>
                        </label>
                    </div>
                    <div id="uploadButton" class="text-center hide">
                        <input type="submit" value="Upload & Convert" class="btn mt-10 capitalize btn-wide text-lg text-white"></input>
                    </div>
                </form>

                <div class="container mx-auto px-4 pt-5">
                    <div id="loader" class="text-center hide">
                        <center>
                            <div>
                                <p class="text-black text-xl">Converting...</p>
                            </div>
                        </center>
                    </div>
                </div>

                <!-- Message  -->
                <div id="messageBox" class="alert alert-warning shadow-lg m-5 w-full sm:w-full md:w-1/4 lg:w-1/4 hide">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div>
                            <h3 id="message" class="font-bold text-black"></h3>
                        </div>
                        <button id="refreshPage" class="btn">Refresh Page</button>
                    </div>
                </div>

                <!-- Download 1  -->
                <div id="downloadFileArea1" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName1" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize1" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL1" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 2  -->
                <div id="downloadFileArea2" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName2" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize2" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL2" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 3 -->
                <div id="downloadFileArea3" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName3" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize3" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL3" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 4  -->
                <div id="downloadFileArea4" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName4" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize4" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL4" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 5  -->
                <div id="downloadFileArea5" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName5" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize5" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL5" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 6  -->
                <div id="downloadFileArea6" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName6" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize6" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL6" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 7  -->
                <div id="downloadFileArea7" class="hide mt-5 mb-5 w-full sm:w-full md:w-1/1 lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName7" class="lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize7" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL7" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>




                <div class="mb-9 sm:container mx-auto">
                    <div class="pt-[3rem]">

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">Hosting Detector: Detect Any Website’s Hosting Details</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">This is a web hosting detector tool where you can website hosting details, blog hosting details, and more. this tool can give you details about the hosting provider name, hosting IP address, hosting nameserver details, hosted sites’ server location, and more information about the detected hosting server.
                                </p>
                            </div>
                        </div>


                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">About this Hosting Detector?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify"><a class="text-blue-900 font-bold" style="color: green !important;" href="http://hostingdetector.in/">HostingDetector.in</a> is the best hosting detector over the internet, HostingDetector.in can detect any site’s hosting server's full details. it can detect the hosting provider name, hosting IP,nameverser details, and more secrets details about the hosted server.
                                </p>
                            </div>
                        </div>

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">Is it Wp Hosting Detector?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">Yes, this is a hosting detector which is also a WP hosting detector means WordPress hosting detector. you can also detect hosting of any with just one click.
                                </p>
                            </div>
                        </div>

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">How To Detect Hosting of a Site/Blog?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">We can't detect hosting details by just visiting the site. But here, in this tool, you can detect server details of any site. Just enter the domain name, after entering a domain name it will detect all details related to the hosting server, in easiest way</p>
                            </div>
                        </div>

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">About Hosting Details Finder?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">A hosting detector or hosting details finder is also almost the same thing, a hosting finder can detect the hosting details of the hosting server. details like nameserver, hosted IP, hosted location, hosted owner name etc.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Frequently Asked Questions  -->
                <div class="mb-9 sm:container mx-auto">
                    <div class="pt-[2rem] pb-[5rem]">
                        <div class="pt-3">
                            <h5 class="py-3 leading-loose font-bold text-slate-900">Frequently Asked Questions</h5>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Is it a hosting provider detector?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">Yes, this is also a hosting provider detector </p>
                            </div>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box  my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Can I detect any hosted domain hosting server details?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">Yes, by using this tool you can detect any hosted site’s hosting details.</p>
                            </div>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box  my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Is This hosting location checker?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">This is a hosting detector but you can detect or check to host location also.</p>
                            </div>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box  my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Is this a ​​wordpress hosting detector?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">Yes, this is also a WordPress hosting detector. if you want to detect WordPress themes and plugins then visit
                                    <a class="text-blue-900 font-bold" style="color: green !important;" href="https://whatthemeis.com/">WhatThemeIs.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/AnuragDeep/OneDrive/Desktop/Freelancing/ogg2mp3/resources/views/home.blade.php ENDPATH**/ ?>