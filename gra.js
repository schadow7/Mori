window.onload = start;
x=true;

var gr1 = new Array(5);
var gr2 = new Array(4);
var r1=0;
var r2=0;
w1=false;
w2=false;
var remis=0;
wynik1=0;
wynik2=0;


function koniec(num)
{	
	for (i=0;i<=5;i++)
		gr1[i]=15;
	
	for (i=0;i<=4;i++)
		gr2[i]=15;
	
	 r1=0;
	 r2=0;
	w1=false;
	w2=false;
	 remis=0;
	 
	 var przycisk;
	 
	 if(num==1)
		 wynik1=wynik1+1;
	 
	  if(num==2)
		 wynik2=wynik2+1;
	
	for(i=0;i<9;i++)
	{
		var element = "kw" + i;
	document.getElementById(element).setAttribute("onclick",";");
	}
	if(num==3)
	document.getElementById("gracz").innerHTML="DRAW";
	else
	document.getElementById("gracz").innerHTML="PLAYER "+num+" HAS WON";

	przycisk='<div class="jeszczeraz" onclick="start()">PLAY AGAIN</div>'
	document.getElementById("ponownagra").innerHTML=przycisk;
	
	
}

function start()
{
	document.getElementById("ponownagra").innerHTML="";
	document.getElementById("gracz").innerHTML="PLAYER 1";
	document.getElementById("gracz").style.color="orange";
	
	document.getElementById("wynik").innerHTML="PLAYER 1: "+wynik1+"  ";
	document.getElementById("wynik").innerHTML+="   PLAYER 2: "+wynik2;
	var trescdiva="";
	
	for(i=0;i<9;i++)
	{
		var element = "kw" + i;
		trescdiva=trescdiva+ '<div class="kwadrat" onclick="sprawdz('+i+')" id="'+element+'">'+'</div>';
	}
	
	document.getElementById("plansza").innerHTML=trescdiva;
	
}

function sprawdz(nr)
{	
var klikniety="";
	if(x)
		{
		gr1[r1]=nr;
		
		
				for (i=0;i<=r2;i++)
			{	if (gr1[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==5)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==8)
								{w1=true;}
							}
						}
					}	
				}	
			}
		
		
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==6)
								{w1=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==1)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==0)
								{w1=true;}
							}
						}
					}	
				}	
			}
			
			
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==1)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==7)
								{w1=true;}
							}
						}
					}	
				}	
			}			


			for (i=0;i<=r2;i++)
			{	if (gr1[i]==3)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==5)
								{w1=true;}
							}
						}
					}	
				}	
			}			
			
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==0)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==3)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==6)
								{w1=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==6)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==7)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==8)
								{w1=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==6)
								{w1=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr1[i]==0)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr1[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr1[i2]==8)
								{w1=true;}
							}
						}
					}	
				}	
		
			}
		
		
		
		x=false;
		var element = "kw" + nr;
		klikniety=klikniety+'<div class="kwadrat1">'+"X"+'</div>';
		document.getElementById(element).innerHTML=klikniety;
		
		document.getElementById(element).setAttribute("onclick",";");
		document.getElementById("gracz").innerHTML="PLAYER 2";
		document.getElementById("gracz").style.color="red";
		r1=r1+1;
		
		if(w1) 
			{
				koniec(1);
			}
		}	
		
	else
		{
		gr2[r2]=nr;	
		
		for (i=0;i<=r2;i++)
			{	if (gr2[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==5)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==8)
								{w2=true;}
							}
						}
					}	
				}	
			}
		
		
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==6)
								{w2=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==1)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==0)
								{w2=true;}
							}
						}
					}	
				}	
			}
			
			
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==1)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==7)
								{w2=true;}
							}
						}
					}	
				}	
			}			


			for (i=0;i<=r2;i++)
			{	if (gr2[i]==3)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==5)
								{w2=true;}
							}
						}
					}	
				}	
			}			
			
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==0)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==3)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==6)
								{w2=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==6)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==7)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==8)
								{w2=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==2)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==6)
								{w2=true;}
							}
						}
					}	
				}	
			}
			
			for (i=0;i<=r2;i++)
			{	if (gr2[i]==0)
				{	for (i1=0;i1<=r2;i1++)
					{	if (gr2[i1]==4)
						{	for (i2=0;i2<=r2;i2++)
							{	if (gr2[i2]==8)
								{w2=true;}
							}
						}
					}	
				}	
			}
		
		x=true;
		var element = "kw" + nr;
		klikniety=klikniety+'<div class="kwadrat2">'+"O"+'</div>';
		document.getElementById(element).innerHTML=klikniety;	
		document.getElementById(element).setAttribute("onclick",";");
		document.getElementById("gracz").innerHTML="PLAYER 1";
		document.getElementById("gracz").style.color="orange";
		r2=r2+1;
		
		
		if(w2) 
			{
			koniec(2);
			}
		}
		if ((r2+r1)==9)
			{	
				remis=2;
				}
		if(remis==2 && w2==false && w1==false)
			{
			koniec(3);
			}
		
}
