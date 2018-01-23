export default class Theather
{
    constructor(options)
    {
        this.chairs;
        this.selected == null;
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
        document.getElementById("conS").addEventListener("click", ()=>{
            let conForm;
            conForm = "<input type=\"hidden\" name=\"chairL\" id=\"chairL\" value=\""+this.selected.length+"\"></input>";
            for (let i = 0; i < this.selected.length; i++)
            {
                conForm = conForm + "<input type=\"hidden\" name=\"seat"+i+"\" id=\"seat"+i+"\" value=\""+this.selected[i]+"\"></input>";
            }
            conForm = conForm + "<input type=\"hidden\" id=\"LSB\" name=\"LSB\" value=\""+this.loveSeats+"\"></input>";
            document.getElementById('formSDitem').innerHTML = conForm;
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
        this.selected = null;
        this.Addselection(seat.id);
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
                            this.Addselection("seat-" +i);
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
                            this.Addselection("seat-" +i);
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
    Addselection(seat)
    {
        if (this.selected == null)
        {
            this.selected = [seat];
        }
        else
        {
            this.selected[this.selected.length] = seat;
        }
        
    }
}