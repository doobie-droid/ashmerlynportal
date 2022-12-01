const form = document.createElement("form");
const element1 = document.createElement("input");
const element2 = document.createElement("input");
const element3 = document.createElement("input");
const element4 = document.createElement("input");
const element5 = document.createElement("input");

function submitFunction(input1, input2, input3) {
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
    form.appendChild(element);

    element4.value = input2.value;
    element4.name = "score_2";
    form.appendChild(element);

    element5.value = input3.value;
    element5.name = "score_3";
    form.appendChild(element5);

    // element6.value = input3.value;
    // element6.name = "score_3";
    // form.appendChild(element6);
    //
    // element7.value = input3.value;
    // element7.name = "score_3";
    // form.appendChild(element7);

    document.body.appendChild(form);

    form.submit();

}



