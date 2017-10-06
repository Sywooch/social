/**
 * Загрузчик фотографий.
 *
 * @type {{params: {formData: Array, uploadQueue: Array, uploadItemsCount: number}, init: ImageUploader.init, load: ImageUploader.load, uploadFile: ImageUploader.uploadFile, uploadQueueStart: ImageUploader.uploadQueueStart}}
 */
var ImageUploader = {
    params: {
        uploaderUrl: '/ajax/image-upload',
        formData: [],
        uploadQueue: [],
        uploadItemsCount: 0,
        uploaded: false
    },

    init: function () {

    },

    /**
     * Выполняет добавление в очередь по урл.
     *
     * @param url
     */
    fromUrl: function (url) {
        const xhr = new XMLHttpRequest();
        xhr.responseType = 'blob';
        xhr.onload = function () {
            const reader = new FileReader(),
                dataURLtoBlob = function (dataurl) {
                    let arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
                    while (n--) {
                        u8arr[n] = bstr.charCodeAt(n);
                    }
                    return new Blob([u8arr], {type: mime});
                };
//        reader.onloadend = function () {
//            callback(reader.result);
//        }
            reader.readAsDataURL(xhr.response);
            reader.onload = function (evt) {
                this.params.formData = [];
                $('.upload-image-list').html('<li>' +
                    '<figure><img src="' + evt.target.result + '" alt="" /></figure>' +
                    '<div class="txt-image">' + url.substring(url.lastIndexOf('/') + 1, url.length) + '</div>' +
                    '</li>');
                this.params.uploadItemsCount = 1;
                let file = dataURLtoBlob(evt.target.result);
                file.name = url.substring(url.lastIndexOf('/') + 1, url.length);
                this.params.formData.push(file);
            };
            reader.onerror = function (evt) {
                $('.error-image').show();
            };
        };
        xhr.open('GET', url);
        xhr.send();
    },

    /**
     * Выполняет добавление в очередь через input.
     *
     * Например <input type="file" class="styler" onchange="ImageUploader.load(this)" multiple="">
     *
     * @param object
     */
    load: function (object) {
        $.each($(object)[0].files, function (i, file) {
            ImageUploader.params.uploadItemsCount++;
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function (evt) {
                $('.step_photo_i_img').append('<span class="loaded_img"><img src="' + evt.target.result + '" alt=""></span>' +
                    '<button class="basket_btn" onclick="ImageUploader.remove(\'' + name + '\', \'' + file.name + '\', this)">' +
                    '<i class="flaticon-garbage"></i>' +
                    '</button>');
            };
            reader.onerror = function (evt) {
                $('.error-image').show();
            };
            // Добавляет значение файла.
            ImageUploader.params.formData.push(file);
        });
    },

    /**
     * Удаляет фотографию из очереди.
     *
     * @param name
     * @param fileName
     * @param object
     */
    remove: function removeUploadPhoto(name, fileName, object) {
        $('.step_photo_i_img').empty();
        $(object).remove();
        var tmpData = [];
        for (let value of this.params.formData) {
            if (value.name == fileName) {
                this.params.uploadItemsCount--;
            } else {
                tmpData.push(value);
            }
        }
        this.params.formData = tmpData;
    },

    /**
     * Загружает файл на сервер.
     *
     * @param key
     * @param file
     */
    uploadFile: function (key, file) {
        const data = new FormData;
        data.append('_csrf', $('[name="_csrf"]').val());
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (evt) {

        data.append('CustomerImage[image]', file, file.name);

            $.ajax({
                url: ImageUploader.params.uploaderUrl,
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    ImageUploader.params.uploaded = false;
                    ImageUploader.params.uploadQueue.shift();
                }
            });
        }
    },

    /**
     * Стартует загрузку очереди.
     */
    uploadQueueStart: function () {
        for (let file of this.params.formData) {
            this.params.uploadQueue.push(file);
        }

        let uploadInterval = setInterval(
            function () {
                if (ImageUploader.params.uploadQueue.length == 0) {
                    clearInterval(uploadInterval);
                    console.log('complete');
                }

                if (ImageUploader.params.uploaded === true)
                    return;

                ImageUploader.params.uploaded = true;
                for (let i in ImageUploader.params.uploadQueue) {
                    ImageUploader.uploadFile(i, ImageUploader.params.uploadQueue[i]);
                    break;
                }
            },
            1000
        );
    }
};
