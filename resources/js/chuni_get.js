(async ()=>{
    var overlay = $('<div>').attr({
        "id": "overlay",
        "style": "background: rgba(0,0,0,0.8);opacity: 1 !important;height: 100%;",
    });
    var modal = $('<div>').attr({
        "id": "_chunilog_modal",
        "style": "background: white;width: 40%;margin: 3rem auto;padding: 3rem;border-radius: 10px;overflow-y: scroll;max-height: 50%;",
    });
    var modal_ul = $('<ul>').attr("style", "text-align: left;");
    modal.append(modal_ul);
    overlay.append(modal);
    $('body').append(overlay);
    if(location.hostname!=='chunithm-net.com'){
        alert('here is not chunithm-net');
    }else{
        add_log('記録の取得を開始します');
        let data=[];
        let token=$('input[name="token"]').val();
        let idxs=$('input[name=idx]').map(function(i,e){return e.value;}).get();
        for(let i of idxs){
            data.push(await get_res(i, token));
            await new Promise(r=>setTimeout(r, 1000)); // sleep 1000 ms
        }
        console.log(JSON.stringify(data));
        add_log('記録の取得が完了しました');
        return $.ajax({
            url: get_chunilog_hostname() + '/api/new_records',
            xhrFields: {
                withCredentials: true,
            },
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            dataType: "json",
        }).done(()=>{
            add_log('記録の送信が完了しました');
        }).fail((err, msg)=>{
            add_log('記録の送信中にエラーが発生しました:');
            add_log(msg);
            console.error(err);
        }).always(() => {
            setTimeout(()=>{overlay.remove();}, 3000);
        });
    }

    function get_num(str){
        return parseInt(str.split(',').join(''));
    }

    function get_res(idx, token) {
        add_log('記録#'+idx+'を取得しています');
        return $.ajax({
            url: '/mobile/record/playlog/sendPlaylogDetail/',
            type: 'POST',
            data: {
                idx,token
            }
        }).then(function(data) {
            level=['basic','advanced','expert', 'master'].indexOf(data.match(/icon_text_(.+)\.png/)[1]);
            data = data.replace(/<(img|link|meta) .+?>/gis, '');
            data = data.replace(/<(form|script|noscript)(?: .*?)?>.*?<\/\1>/gis, '');
            doc = $(data);
            add_log('成功しました');
            return {
                time: doc.find('.box_inner01').text(),
                title: doc.find('.play_musicdata_title').text(),
                level: level,
                track: get_num(doc.find('.play_track_text').text().split(' ')[1]),
                store: doc.find('.play_data_store_tap').text(),
                combo: get_num(doc.find('.play_musicdata_max_number').text()),
                critical: get_num(doc.find('.text_critical').text()),
                justice: get_num(doc.find('.text_justice').text()),
                attack: get_num(doc.find('.text_attack').text()),
                miss: get_num(doc.find('.text_miss').text()),
            };
        }).fail(function(err, msg) {
            add_log('記録の取得中にエラーが発生しました:');
            add_log(msg);
            console.error(err);
        });
    }

    function get_chunilog_hostname() {
        var src;
        if (document.currentScript) {
            src = document.currentScript.src;
        } else {
            var scripts = document.getElementsByTagName('script'),
            script = scripts[scripts.length-1];
            if (script.src) {
                src = script.src;
            }
        }
        console.log(src);
        if(!src)return null;
        console.log(src.match(/((?:\w+:\/\/)?(?:\w+\.)*(?:\w+)(?::\d+)?)\//)[1]);
        return src.match(/((?:\w+:\/\/)?(?:\w+\.)*(?:\w+)(?::\d+)?)\//)[1];
    }

    function add_log(str) {
        modal_ul.append($('<li>').text(str));
        modal.scrollTop(modal[0].scrollHeight);
    }
})();
