export default class Theather
{
    constructor(options)
    {
        this.chairs;
        this.selected;
        this.amountSeats = options.amountSeats;
        this.loveSeats = (options.loveSeats == "true" ? true : false);
        this.HoverEvent();
        this.ClickEvent();
    }

    HoverEvent()
    {
        this.chairs = document.getElementsByClassName("chair");
        for (let i = 0; i < this.chairs.length; i++)
        {
            console.log(this.loveSeats);
            if (!this.loveSeats)
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
            else if (this.loveSeats)
            {
                this.chairs[i].addEventListener("mouseover", () => {
                    if (!this.chairs[i].classList.contains("bezet") && this.chairs[i].classList.contains("loveSeat"))
                    {
                        this.colorChangeSeat(this.chairs[i]);
                        this.setSeatCompanion(this.chairs[i]);
                    }
                });

                this.chairs[i].addEventListener("mouseout", () => {
                    if (!this.chairs[i].classList.contains("bezet") && this.chairs[i].classList.contains("loveSeat"))
                    {
                        this.colorChangeSeat(this.chairs[i]);
                        this.setSeatCompanion(this.chairs[i]);
                    }
                });
            }

        }
    }

    ClickEvent()
    {
        // zet scripts uit als je click
        document.getElementById("conS").addEventListener("click", ()=>{
            console.log(1);
            // make form
            let conForm;
            conForm = "<input type=\"hidden\" id=\"chairL\" value=\""+this.chairs.length+"\"></input>";
            for (let i = 0; i < this.chairs.length; i++)
            {
                conForm = conForm + "<input type=\"hidden\" id=\"seat"+i+"\" value=\""+this.chairs[i]+"\"></input>";
            }
            conForm = conForm + "<input type=\"hidden\" id=\"LSB\" value=\""+this.loveSeats+"\"></input>";
            document.getElementById('formSD').innerHTML = conForm;
            // send form
            document.formSDname.submit();
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
            seat.src = "/img/bioscoop/loveseatSelect.png";
            break;
            case "/img/bioscoop/seatSelect.png":
            seat.src = "/img/bioscoop/seat.png";
            break;
            case "/img/bioscoop/loveseatSelect.png":
            seat.src = "/img/bioscoop/loveseat.png";
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
                if (this.loveSeats)
                {
                    if (document.getElementById("seat-" + i).classList.contains("loveSeat"))
                    {
                        if (!document.getElementById("seat-" + i).classList.contains("bezet"))
                        {
                            this.colorChangeSeat(document.getElementById("seat-" + i));
                            this.selected = "seat-" +i;
                        }
                        else
                        {
                            amountSeatsMax++;
                        }
                    }
                }
                else
                {
                    if (!document.getElementById("seat-" + i).classList.contains("loveSeat"))
                    {
                        if (!document.getElementById("seat-" + i).classList.contains("bezet"))
                        {
                            this.colorChangeSeat(document.getElementById("seat-" + i));
                            this.selected = "seat-" + i;
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

    
}