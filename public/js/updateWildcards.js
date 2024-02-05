function addInput(){
    let inputs = JSON.parse(document.getElementById('inputs').value);
    let new_input = document.getElementById('new_input').value;
    document.getElementById('new_input').value = "";
    inputs.push(new_input);
    const str_inputs = JSON.stringify(inputs);
    document.getElementById('inputs').value = str_inputs;

}


function clearInput(){
    document.getElementById('inputs').value = "[]";
}