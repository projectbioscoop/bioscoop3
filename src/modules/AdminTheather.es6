export default class AdminTheather
{
    constructor()
    {
        this.arrow = document.getElementsByClassName("Arrow");
        
        for (let i = 0; i<this.arrow.length; i++)
        {
            this.arrow[i].addEventListener('click', ()=>{
                if (this.arrow[i].classList.contains("activeClass"))
                {
                    let id = this.arrow[i].id;
                    this.arrow[i].className = "Arrow"
                    this.arrow[i].style.transform = "rotate(0deg)";
                    document.getElementById("item-"+id).style.display = "none"; 
                }
                else
                {
                    let id = this.arrow[i].id;
                    this.arrow[i].className += " activeClass"
                    this.arrow[i].style.transform = "rotate(180deg)";
                    document.getElementById("item-"+id).style.display = "block"; 
                }
            });
        }
    }
}