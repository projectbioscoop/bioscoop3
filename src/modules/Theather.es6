export default class Theather
{
    constructor(options)
    {
        this.chairs;
        this.selected;
        this.amountSeats = options.amountSeats;
        this.loveSeats = options.loveSeats;
        this.HoverEvent()
    }

    HoverEvent()
    {
        this.chairs = document.getElementsByClassName("chair");
        for (let i = 0; i < this.chairs.length; i++)
        {
            this.chairs[i].addEventListener("mouseover", () => {
                if (!this.chairs[i].classList.contains("bezet") && !this.chairs[i].classList.contains("loveSeat"))
                {    
                    this.colorChangeSeat(this.chairs[i]);
                    this.setSeatCompanion(this.chairs[i]);
                }
            });

            this.chairs[i].addEventListener("mouseout", () => {
                if (!this.chairs[i].classList.contains("bezet") && !this.chairs[i].classList.contains("loveSeat"))
                {
                    this.colorChangeSeat(this.chairs[i]);
                    this.setSeatCompanion(this.chairs[i]);
                }
            });
        }
    }

    ClickEvent()
    {
        document.getElementsByClassName("chair").addEventListener("click", ()=>{
            fetch("google.com/"+this.selected);//url
        });
    }

    colorChangeSeat(seat)
    {
        switch(seat.src.split("000")[1])
        {
            case "/img/bioscoop/seat.png":
            seat.src = "/img/bioscoop/seatSelect.png";
            break;
            case "/img/bioscoop/loveseat.png":
            seat.src = "/img/bioscoop/loveseatSelect.png"
            break;
            case "/img/bioscoop/seatSelect.png":
            seat.src = "/img/bioscoop/seat.png";
            break;
            case "/img/bioscoop/loveseatSelect.png":
            seat.src = "/img/bioscoop/loveseat.png"
            break;
        }
    }

    setSeatCompanion(seat)
    {
        let amountSeatsMin = Math.floor(parseInt(seat.id.split("-")[1]) - ((this.amountSeats - 1 ) / 2));
        (amountSeatsMin < 0 ? amountSeatsMin = 0 : null );
        let amountSeatsMax = parseInt(seat.id.split("-")[1]) + (this.amountSeats / 2);
        for (let i = amountSeatsMin; i < amountSeatsMax;  i++)
        {
            if (seat.id != ("seat-" + i) && i >= 0)
            {
                if (!document.getElementById("seat-" + i).classList.contains("loveSeat"))
                {
                    if (!document.getElementById("seat-" + i).classList.contains("bezet"))
                    {
                        this.colorChangeSeat(document.getElementById("seat-" + i));
                    }
                    else
                    {
                        amountSeatsMax++;
                    }   
                }
            }
        }
    }

    
}