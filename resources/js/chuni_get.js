function get_num(str){
    return parseInt(str.split(',').join(''));
}

function get_res(idx, token) {
    return $.ajax({
        url: '/mobile/record/playlog/sendPlaylogDetail/',
        type: 'POST',
        data: {
            idx,token
        }
    }).then(function(data) {
        console.log(data);
        level=['basic','advanced','expert', 'master'].indexOf(data.match(/icon_text_(.+)\.png/)[1]);
        data = data.replace(/<(img|link|meta) .+?>/gis, '');
        data = data.replace(/<(form|script|noscript)(?: .*?)?>.*?<\/\1>/gis, '');
        console.log(data);
        doc = $(data);
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
    }).fail(function(err) {
        console.error(err);
    });
}
(async ()=>{
    if(location.hostname!=='chunithm-net.com'){
        alert('here is not chunithm-net');
    }else{
        let data=[];
        let token=$('input[name="token"]').val();
        let idxs=$('input[name=idx]').map(function(i,e){return e.value;}).get();
        for(let i of idxs)data.push(await get_res(i, token));
        console.log(JSON.stringify(data));
        return $.ajax({
            url: '{api_path}',
            xhrFields: {
                withCredentials: true,
            },
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            dataType: "json",
        }).then(function(){
            alert('success!');
        }).fail(function(err) {
            alert('error occured');
            console.error(err);
        });
    }
})();
