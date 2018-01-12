export default class Display

{
    constructor()
    {
        this.loveseat = document.getElementById("loveseatselect");
        this.loveseat.disabled = false;
        this.loveseatbool = document.getElementById("loveseat");
        this.normal = document.getElementById("normalselect");
        this.normal.disabled = false;
        this.start();
    }

    start()
    {
        this.loveseat.addEventListener("change", () => {
            let selected = this.loveseat.options[this.loveseat.selectedIndex].value;
            if(selected != 0)
            {
                this.normal.disabled = true;
                this.loveseatbool.value = "true";
            }
            else
            {
                this.normal.disabled = false;
            }
        })

        this.normal.addEventListener("change", () => {
            let selected = this.normal.options[this.normal.selectedIndex].value;
            console.log(selected);
            if(selected != 0)
            {
                this.loveseat.disabled = true;
                this.loveseatbool.value = "false";
            }
            else
            {
                this.loveseat.disabled = false;
            }
        })
    }
}


