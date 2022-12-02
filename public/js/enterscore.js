const form = document.createElement("form");
const element1 = document.createElement("input");
const element2 = document.createElement("input");
const element3 = document.createElement("input");
const element4 = document.createElement("input");
const element5 = document.createElement("input");
const element6 = document.createElement('input');
const element7 = document.createElement('input');
const element8 = document.createElement('input');


function submitFunction(input1, input2, input3, year_id, user_id, subject_id) {
    console.log(input1)
    form.method = "POST";
    form.action = "/staff/scores/edit";

    element1.value = "PATCH";
    element1.name = "_method";
    form.appendChild(element1);

    element2.value = document.getElementById('token').textContent;
    element2.name = "_token";
    form.appendChild(element2);

    element3.value = input1.value;
    element3.name = "score_1";
    form.appendChild(element3);

    element4.value = input2.value;
    element4.name = "score_2";
    form.appendChild(element4);

    element5.value = input3.value;
    element5.name = "score_3";
    form.appendChild(element5);

    element6.value = subject_id.value;
    element6.name = "subject_id";
    form.appendChild(element6);

    element7.value = year_id.value;
    element7.name = "year_id";
    form.appendChild(element7);

    element8.value = user_id.value;
    element8.name = "user_id";
    form.appendChild(element8);


    document.body.appendChild(form);
    console.log(input1)


    form.submit()


}



