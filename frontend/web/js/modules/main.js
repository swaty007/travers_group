import * as Toastr from 'toastr'
import Compressor from 'compressorjs'
// import Cropper from 'cropperjs';
Toastr.options = {
    'closeButton': false,
    'debug': false,
    'newestOnTop': true,
    'progressBar': true,
    'positionClass': 'toast-top-left',
    'preventDuplicates': false,
    'onclick': null,
    'showDuration': '300',
    'hideDuration': '1000',
    'timeOut': '5000',
    'extendedTimeOut': '1000',
    'showEasing': 'swing',
    'hideEasing': 'linear',
    'showMethod': 'fadeIn',
    'hideMethod': 'fadeOut',
}
window.toastr = Toastr
class Main {
    constructor () {
        this.events()
    }
    events () {
        this.init()
        this.fileContainer()
    }
    init () {
        // $("img.lazy").Lazy()
        $('#w1 .navbar-toggle').addClass('collapsed')
    }
    fileContainer () {
        $(".fileContainer input[type=file]").on('change', function (e) {
            var input = this
            if (input.files && input.files[0]) {
                var reader = new FileReader()
                if (input.files[0].size/1024/1024 > 2) {
                    Toastr['error']("Файл превышает размер в 2мб")
                    return
                }
                new Compressor(input.files[0], {
                    quality: 0.6,
                    success: (result) => {
                        const dT = new ClipboardEvent('').clipboardData || // Firefox < 62 workaround exploiting https://bugzilla.mozilla.org/show_bug.cgi?id=1422655
                            new DataTransfer() // specs compliant (as of March 2018 only Chrome)
                        dT.items.add( new File([result], input.files[0].name, { type: input.files[0].type }) )
                        input.files = dT.files
                        // input.files[0] = new File();
                    } })
                reader.onload = function (e) {
                    $(".fileContainer .fileContainer__img").attr('src', e.target.result).show()
                    $(".fileContainer .fileContainer__text--select").remove()
                    $(".fileContainer .fileContainer__text--name").addClass('loaded')
                    // const cropper = new Cropper($(".fileContainer .fileContainer__img")[0]);
                }
                reader.readAsDataURL(input.files[0])
            }
        })
    }
}

export default Main