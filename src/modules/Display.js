export default class Display

{
    constructor(){
        this.loveseat = document.getElementById("loveseat");
        this.normal = document.getElementById("normal");
    }

    disableSelect()
    {
        this.loveseat.addEventListener("cuechange")
    }
}


