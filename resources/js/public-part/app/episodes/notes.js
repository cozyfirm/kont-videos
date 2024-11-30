import { Notify } from './../../../style/layout/notify.ts';

$(document).ready(function (){
    let saveNewNoteUri = '/episodes/notes/save';
    let loadNoteUri = '/episodes/notes/load';
    let updateNoteUri = '/episodes/notes/update';
    let deleteNoteUri = '/episodes/notes/delete';
    let lastNoteID = 0;
    /**
     *  Show hide add new note textarea
     */
    $(".add__new_note").click(function (){
        $(this).parent().toggleClass('show__textarea');
    })

    /**
     *  Save new note with attributes:
     *      - time
     *      - note
     *      - episode_id
     *      - video_id
     */
    $(".save-new-note").click(function (){
        let noteWrapper = $(".add__new_note");

        $.ajax({
            url: saveNewNoteUri,
            method: 'POST',
            dataType: "json",
            data: {
                time: $(".note__time").text(),
                note: $("#new_note").val(),
                episode_id: noteWrapper.attr('episode-id'),
                video_id: noteWrapper.attr('video-id'),
                chapter_id: noteWrapper.attr('chapter-id')
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let note = response['data']['note'];
                    let video = response['data']['video'];

                    $("#new_note").val("");
                    $(".add__note___wrapper").toggleClass("show__textarea");

                    $(".all__notes").prepend(function (){
                        return $("<div>").attr('class', 'single__note').attr('note-id', note['id'])
                            .append(function (){
                                return $("<div>").attr('class', 'note__header')
                                    .append(function (){
                                        return $("<div>").attr('class', 'time__badge')
                                            .append(function (){
                                                return $("<p>").text(note['time']);
                                            })
                                    })
                                    .append(function (){
                                        return $("<div>").attr('class', 'icons__wrapper')
                                            .append(function (){
                                                return $("<div>").attr('class', 'icon__wrapper edit__note__trigger').attr('title', 'Uredi zabilješku')
                                                    .append(function (){
                                                        return $("<i>").attr('class', 'fi fi-bs-edit');
                                                    })
                                            }).append(function (){
                                                return $("<div>").attr('class', 'icon__wrapper delete__note__trigger').attr('title', 'Obriši zabilješku')
                                                    .append(function (){
                                                        return $("<i>").attr('class', 'fi fi-bs-trash');
                                                    })
                                            })
                                    })
                            })
                            .append(function (){
                                return $("<div>").attr('class', 'note__body')
                                    .append(function (){
                                        return $("<h2>").text(video['title']);
                                    })
                                    .append(function (){
                                        return $("<p>").attr('class', 'note__body__value').text(note['note']);
                                    })
                            })
                            .append(function (){
                                return $("<div>").attr('class', 'note__footer')
                                    .append(function (){
                                        return $("<p>").text(note['createdAtDate']);
                                    })
                            })
                    });

                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
    });

    $('body').on('click', '.edit__note__trigger', function() {
        let $this = $(this);

        $.ajax({
            url: loadNoteUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: $this.parent().parent().parent().attr('note-id')
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    let note = response['data']['note'];
                    let video = response['data']['video'];

                    $(".edit__note_time_badge").text(note['time']);
                    $(".en__header_value").text(video['title']);
                    $(".edit-note").val(note['note']);

                    lastNoteID = note['id'];

                    $(".edit__note__wrapper").addClass('d-flex');
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
    }).on('click', '.delete__note__trigger', function() {
        let $this = $(this);

        $.ajax({
            url: deleteNoteUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: $this.parent().parent().parent().attr('note-id')
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    $this.parent().parent().parent().remove();

                    Notify.Me([response['message'], "success"]);
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
    });

    $(".edit-note-btn").click(function (){
        $.ajax({
            url: updateNoteUri,
            method: 'POST',
            dataType: "json",
            data: {
                id: lastNoteID,
                note: $(".edit-note").val()
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    Notify.Me([response['message'], "success"]);
                    $(".single__note[note-id='" + lastNoteID + "']").find('.note__body__value').text($(".edit-note").val());

                    $(".edit__note__wrapper").removeClass('d-flex');
                }else{
                    Notify.Me([response['message'], "danger"]);
                }
            }
        });
    });

    /**
     *  Close review on X or anywhere except the box
     */
    let closeEditNote = function (){
        $(".edit__note__wrapper").removeClass('d-flex');
    };

    /* Hide on click */
    $(".edit__note__wrapper").click(function (event){
        if($(event.target).hasClass('edit__note__wrapper')){
            closeEditNote();
        }
    });
    $(".en__header").click(function (){
        closeEditNote();
    });
});
