class Map {
    constructor() {
        this.init()
    }
    init() {

            let ukraineRegions = {
                vinnitsa : 'Винницкая',
                volyn : 'Волынская',
                dnepropetrovsk : 'Днепропетровская',
                donetsk : 'Донецкая',
                zhytomyr : 'Житомирская',
                transcarpathian : 'Закарпатская',
                zaporizhzhya : 'Запорожская',
                ivanoFrankivsk : 'Ивано-Франковская',
                kiev : 'Киевская',
                kirovograd : 'Кировоградская',
                lugansk : 'Луганская',
                lviv : 'Львовская',
                nikolaev : 'Николаевская',
                odessa : 'Одесская',
                poltava : 'Полтавская',
                rivne : 'Ровненская',
                sumy : 'Сумская',
                ternopol : 'Тернопольская',
                kharkov : 'Харьковская',
                kherson : 'Херсонская',
                khmelnitsky : 'Хмельницкая',
                cherkasy : 'Черкасская',
                chernihiv : 'Черниговская',
                chernivtsi : 'Черновицкая',
                krimNash : 'Крымская'
            };
            let ukraineData = [
                {
                    id: "kiev",
                    stableColor: "#7cccaa",
                    hoverColor: "#01a964",
                    patient: 316,
                },
                {
                    id: "vinnitsa",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 17,
                },
                {
                    id: "volyn",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 1,
                },
                {
                    id: "dnepropetrovsk",
                    stableColor: "#7cccaa",
                    hoverColor: "#01a964",
                    patient: 9,
                },
                {
                    id: "donetsk",
                    stableColor: "#7cccaa",
                    hoverColor: "#01a964",
                    patient: 6,
                },
                {
                    id: "zhytomyr",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 11,
                },
                {
                    id: "transcarpathian",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 4,
                },
                {
                    id: "zaporizhzhya",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 10,
                },
                {
                    id: "ivanoFrankivsk",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 11,
                },
                {
                    id: "kirovograd",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 5,
                },
                {
                    id: "lugansk",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 5,
                },
                {
                    id: "lviv",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 13,
                },
                {
                    id: "nikolaev",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 7,
                },
                {
                    id: "odessa",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 33,
                },
                {
                    id: "poltava",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 12,
                },
                {
                    id: "rivne",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 17,
                },
                {
                    id: "sumy",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 11,
                },
                {
                    id: "ternopol",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 7,
                },
                {
                    id: "kharkov",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 5,
                },
                {
                    id: "kherson",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 5,
                },
                {
                    id: "khmelnitsky",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 12,
                },
                {
                    id: "cherkasy",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 15,
                },
                {
                    id: "chernivtsi",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 4,
                },
                {
                    id: "chernihiv",
                    stableColor: "#7cccaa",
                    hoverColor: "#01A964",
                    patient: 8,
                },
                {
                    id: "krimNash",
                    stableColor: "#7cccaa",
                    hoverColor: "#01a964",
                    patient: 1,
                },
            ];
            ukraineData.forEach( function (item) {
                let id = '#' + item.id;
                $(id).attr('data-toggle', 'tooltip');
                $(id).attr('data-placement', 'top');
                $(id).attr('fill', item.stableColor);
                $(id).attr('title', ukraineRegions[item.id] + ' область, пациентов ' + item.patient);
                $(id).hover(function (e) {
                    $(this).attr('fill', item.hoverColor)
                }, function (e) {
                    $(this).attr('fill', item.stableColor)
                });
            });
            $('[data-toggle="tooltip"]').tooltip()
    }
}
