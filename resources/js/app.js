window.$ = window.jQuery = require('jquery')

jQuery(document).ready(function ($) {
  'use strict'
  // Fly-Out Navigation
  $('.arya-fly-but-click').on('click', function () {
    $('#arya-fly-wrap').toggleClass('arya-fly-menu')
    $('#arya-fly-wrap').toggleClass('arya-fly-shadow')
    $('.arya-fly-but-wrap').toggleClass('arya-fly-open')
    $('.arya-fly-fade').toggleClass('arya-fly-fade-trans')
  })

  $('#overlay').on('click', function () {
    $('#arya-fly-wrap').toggleClass('arya-fly-menu')
    $('#arya-fly-wrap').toggleClass('arya-fly-shadow')
    $('.arya-fly-but-wrap').toggleClass('arya-fly-open')
    $('.arya-fly-fade').toggleClass('arya-fly-fade-trans')
  })
})

$(document).ready(function () {
  $('#refreshPage').on('click', function () {
    location.reload(true)
  })


  $('#removeInputFileButton').on('click', function (e) {
    $('#file').val('')

    // $('#uploadButton').addClass('hide')
    // $('#uploadButton').removeClass('show')

    $('#uploadArea').addClass('show')
    $('#uploadArea').removeClass('hide')

    $('#fileInfoBox').addClass('hide')
    $('#fileInfoBox').removeClass('show')
  })
})

function handleFile(file) {
  if (file.type == 'audio/ogg' || file.type == 'video/ogg') {
    $('#messageBox').addClass('hide')
    $('#messageBox').removeClass('show')

    $('#refreshPage').addClass('hide')
    $('#refreshPage').removeClass('show')

    //   $('#uploadButton').addClass('show')
    //   $('#uploadButton').removeClass('hide')

    //   $('#uploadArea').addClass('hide')
    //   $('#uploadArea').removeClass('show')

    $('#fileInfoBox').addClass('show')
    $('#fileInfoBox').removeClass('hide')

    $('#inputFileName').html(file.name)

    let size = file.size
    size = Math.round((size / 1024).toFixed(2))

    if (size < 1024) {
      $('#inputFileSize').html(size + ' KB')
    } else {
      size = Math.round((size / 1024).toFixed(2))
      $('#inputFileSize').html(size + ' MB')
    }

    uploadFile(file)
    // $('#audioUploadForm').submit();
  } else {
    $('#messageBox').addClass('show')
    $('#messageBox').removeClass('hide')
    $('#message').html('Please Upload OGG files only')

    $('#refreshPage').addClass('hide')
    $('#refreshPage').removeClass('show')

    //   $('#uploadButton').addClass('hide')
    //   $('#uploadButton').removeClass('show')

    $('#uploadArea').addClass('show')
    $('#uploadArea').removeClass('hide')

    $('#fileInfoBox').addClass('hide')
    $('#fileInfoBox').removeClass('show')
  }
}


window.addEventListener("load", function () {
  myFileList.addEventListener("drop", dropHandler, false);
  myFileList.addEventListener("dragover", function (ev) {
    ev.preventDefault();
  }, false);

  function dropHandler(ev) {
    ev.preventDefault();
    var filelist = ev.dataTransfer.files;

    for (var i = 0, f; f = filelist[i]; i++) {
      var reader = new FileReader();
      reader.onload = (function (theFile) {
        handleFile(theFile);
      })(f);
      break;
    }
  }
});


$(document).ready(function () {
  var readURL = function (input) {
    if (input.files && input.files[0]) {
      console.log(input.files[0]);
      handleFile(input.files[0]);
    }
  }
  $(".file-upload").on('change', function () {
    readURL(this);
  });

  $(".upload-button").on('click', function () {
    $(".file-upload").click();
  });
});

var convertedFileCount = 0
function uploadFile(file) {
  // e.preventDefault()
  if (true && convertedFileCount < 7) {
    // var file = $('#file')[0].files['0']
    var postData = new FormData()
    postData.append('file', file)

    let postURL = window.location.origin + '/audio/convert'

    $.ajax({
      type: 'POST',
      url: postURL,
      data: postData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $('#loader').addClass('show')
        $('#loader').removeClass('hide')
      },
      success: function (result) {
        //   $('#uploadButton').addClass('hide')
        //   $('#uploadButton').removeClass('show')

        convertedFileCount = convertedFileCount + 1

        $('#downloadFileArea' + convertedFileCount).addClass('show')
        $('#downloadFileArea' + convertedFileCount).removeClass('hide')

        $('#downloadFileName' + convertedFileCount).html(result.data.name)
        $('#downloadFileURL' + convertedFileCount).attr(
          'download',
          result.data.name,
        )
        $('#downloadFileURL' + convertedFileCount).attr(
          'href',
          window.location.origin + result.data.url,
        )

        let size = getFileSize(window.location.origin + result.data.url)
        size = Math.round((size / 1024).toFixed(2))

        if (size < 1024) {
          $('#downloadFileSize' + convertedFileCount).html(size + ' KB')
        } else {
          size = Math.round((size / 1024).toFixed(2))
          $('#downloadFileSize' + convertedFileCount).html(size + ' MB')
        }

        function getFileSize(url) {
          var fileSize = ''
          var http = new XMLHttpRequest()
          http.open('HEAD', url, false)
          http.send(null)
          if (http.status === 200) {
            fileSize = http.getResponseHeader('content-length')
          }
          return fileSize
        }
      },
      error: function (data) {
        $('#message').html('Incorrect Domain or Data does not exist')
      },
      complete: function () {
        $('#loader').addClass('hide')
        $('#loader').removeClass('show')
      },
    }).done(function (result) {
      if (result.success == true) {
      } else {
        $('#message').html(result.message)
      }
    })
  } else {
    console.log(7)
    $('#messageBox').addClass('show')
    $('#messageBox').removeClass('hide')

    $('#refreshPage').addClass('show')
    $('#refreshPage').removeClass('hide')
    console.log('You can convert 7 files at once')
    $('#message').html('You can convert 7 files at once')
  }
}
