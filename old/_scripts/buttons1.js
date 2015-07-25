/* Copyright by pitmar webdesign - www.pitmar.com */

if (document.images)
{
button = new Array();
buttclick = new Array();
sel = new Array();


	for(i = 1; i <= numb; i++)
	{
	button[i] = new Image(); button[i].src = path_butt + i + "a.gif";
	buttclick[i] = new Image(); buttclick[i].src = path_butt + i + "b.gif";
	sel[i] = false;
	}
}

function reset_all()
{
	if (document.images)
	{
		for(i = 1; i <= numb; i++)
		{
		sel[i] = false;
		window.document.images[i].src = button[i].src;
		}
	}
}

function move_out(nr)
{
	if (document.images)
	{
		if(!sel[nr])
		{
		window.document.images[nr].src = button[nr].src;
		}
	}
}

function move_in(nr)
{
	if (document.images)
	{
		if(!sel[nr])
		{
		window.document.images[nr].src = buttclick[nr].src;
		}
	}
}

function clicked(nr)
{
	if (document.images)
	{
	reset_all();
	window.document.images[nr].src = buttclick[nr].src;
	sel[nr] = true;
	}
}
