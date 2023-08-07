@extends('layouts.app')

@section('content')
<div class="mx-auto min-h-screen">
    <div class="flex flex-wrap mt-16 md:mt-0 lg:mt-0 p-[0rem] md:p-[5rem] lg:p-[5rem]">

        <div class="w-full min-h-[80vh] flx flex-col  rounded-3xl ">
            <div class="card p-5 md:p-10 rounded-3xl drop-shadow-xl overflow-hidden flex-1 flex flex-col items-center">

                <!-- FileInfo  -->
                <div id="fileInfoBox" class="bg-[#346CFB] flow-root hide mt-5 mb-5 w-full lg:w-1/2 m-5 card p-10 rounded-lg drop-shadow-3xl overflow-hidden items-center ">
                    <div class="float-left mr-10">
                        <h3 id="inputFileName" class="break-all text-xl md:text-3xl lg:text-3xl font-bold text-white"></h3>
                        <p id="inputFileSize" class="text-lg text-white"></p>
                    </div>
                    <!-- <div class="float-right">
                        <button id="removeInputFileButton" class="btn btn-circle mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div> -->
                </div>
                <!-- FileInfo End -->

                <!-- Form  -->
                <form id="audioUploadForm" method="POST" enctype="multipart/form-data" class="m-5 items-center w-full lg:w-1/2">
                    <div class="upload-button" draggable="true" id="myFileList">
                        <div id="uploadArea">
                            <label class="bg-white hover:bg-green-200 border-dotted border-2 border-black items-center flex justify-center  h-32 transition rounded-md cursor-pointer">
                                <span class="flex justify-center items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span class="font-medium text-white-600">
                                        Drop file to Attach, or
                                        <span class="">browse</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <input class="file-upload" style="border: 2px red solid;" class="" type="file" id="fileup" accept="audio/*" multiple="" hidden>


                    <div id="uploadButton" class="text-center hide">
                        <input type="submit" value="Upload & Convert" class="btn mt-10 capitalize btn-wide text-lg text-white"></input>
                    </div>
                </form>
                <!-- Form End -->

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
                <div id="messageBox" class="alert alert-warning shadow-lg m-5 w-full lg:w-1/2 hide">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div>
                            <h3 id="message" class="font-bold text-black"></h3>
                        </div>
                        <button id="refreshPage" class="btn hide">Refresh Page</button>
                    </div>
                </div>

                <!-- Download 1  -->
                <div id="downloadFileArea1" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName1" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize1" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL1" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 2  -->
                <div id="downloadFileArea2" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName2" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize2" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL2" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 3 -->
                <div id="downloadFileArea3" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName3" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize3" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL3" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 4  -->
                <div id="downloadFileArea4" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName4" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize4" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL4" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 5  -->
                <div id="downloadFileArea5" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName5" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize5" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL5" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 6  -->
                <div id="downloadFileArea6" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName6" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize6" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL6" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>

                <!-- Download 7  -->
                <div id="downloadFileArea7" class="hide mt-5 mb-5 w-full lg:w-1/2">
                    <div class="flow-root bg-white border-2 border-[#346CFB] rounded-3xl card lg:p-10 p-5 drop-shadow-xl overflow-hidden items-center shadow-md hover:shadow-md">
                        <div class="float-left mr-10">
                            <h3 id="downloadFileName7" class="break-all lg:text-3xl md:text-2xl text-md font-bold overflow-hidden text-black"></h3>
                            <p id="downloadFileSize7" class="text-lg text-slate-700"></p>
                        </div>
                        <div class="float-right mt-2 rounded-lg bg-[#346CFB]">
                            <a id="downloadFileURL7" href="" download="" class="btn glass lg:btn-wide text-lg text-slate-900 capitalize" style="color:black !important;">Download</a>
                        </div>
                    </div>
                </div>




                <div class="mb-9 sm:container mx-auto">
                    <div class="pt-[0rem]">

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">Ogg to Mp3</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">Here just upload your ogg or .ogg file and this tool will convert your ogg to an mp3 file. how do you convert? It's simple just upload or drag and drops your ogg file into the upload box. within a few seconds, your ogg will transform into an mp3 file. now you use an mp3 file for your work.
                                </p>
                            </div>
                        </div>


                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">How to convert Ogg to mp3?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">It is very easy to convert Ogg to mp3 with the help of the tool. To convert to Ogg to mp3, first of all, you have to upload your ogg file, Along with uploading, your file will be converted to MP3 and you can download it by clicking on the download button.

                                </p>
                            </div>
                        </div>

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">ogg to mp3</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">.OGG and OGG are the same formats and with the help of this tool, you can convert. the OGG file to .MP3 that too very easily.
                                </p>
                            </div>
                        </div>

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">Can I convert the WhatsApp Ogg file to mp3?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">When any voice message is sent on WhatsApp and we download it then that file is in Ogg format and we can convert the same Ogg format to an mp3/.mp3 file with the help of this tool and use it for our work.
                                </p>
                            </div>
                        </div>

                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">Convert Ogg file to mp3 with the app?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">I don't know if there is an app to convert Ogg files to mp3 but you can convert Ogg files to mp3 with the help of the oggtomp3.net tool and it is a very good online tool with which you can convert Ogg or .ogg files to MP3 very easily and in very less time.</p>
                            </div>
                        </div>


                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">What is .ogg and .mp3?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">OGG and MP3 are both audio formats that are used to stream any audio, especially nowadays o GG format is used for high-quality swimming.</p>
                            </div>
                        </div>


                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">About OggToMp3.net Tool?</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">This is the best ogg to mp3 tool, using which you can convert OGG files to MP3 within microseconds. In the tool, you can convert unlimited OGG format to MP3 and you can access and use this tool from any device.</p>
                                <p class="py-3 leading-normal text-slate-900 text-justify">The special thing about the converter is that you do not need to sign up to use it and do not need to take any paid membership, you can use the converter for absolutely free, and you can convert unlimited files to mp3.
                                </p>
                            </div>
                        </div>


                        <div class="card bg-white my-12 p-5">
                            <div class="card-body shadow-none">
                                <h2 class="card-title text-[#346CFB]">Security guaranteed</h2>
                                <p class="py-3 leading-normal text-slate-900 text-justify">Your ogg files will automatically be deleted from our servers a few hours after you are done working with them. Nobody has access to them except you.
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
                                Can i convert .ogg file to .mp3?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">Yes, of course, you can convert unlimited files that too for free.</p>
                            </div>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box  my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Do I need a sign-up to use this tool?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">As I have mentioned earlier, you do not need to take any signup and paid membership to use this tool, it is absolutely a free tool.
                                </p>
                            </div>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box  my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Can I use this ogg to mp3 converter offline?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">No, this is an online ogg to mp3 converter, you need an internet connection to use this tool.
                                </p>
                            </div>
                        </div>

                        <div tabindex="0" class="collapse collapse-plus border border-[#346CFB] bg-base-100 rounded-box  my-12 ">
                            <input type="checkbox" class="peer">
                            <h5 class="collapse-title text-xl bg-[#346CFB] text-white pr-7 pl-7">
                                Can i convert WhatsApp .ogg file to .mp3 file?
                            </h5>
                            <div class="collapse-content bg-[#ffffff] ">
                                <p class="py-3 leading-normal text-slate-900 text-justify pr-3 pl-3">Yes, you can.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
@endsection