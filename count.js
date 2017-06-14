/**
 * Created by user1 on 01-Aug-15.
 */

var xmlHttp = createXmlHttpRequestObject();
var voteid;

function createXmlHttpRequestObject(){
    var xmlHttp;
    alert("Initializing")

    if(window.ActiveXObject)
    {
        try
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e)
        {
            xmlHttp = false;
        }
    }
    else
    {
        try
        {
            xmlHttp = new XMLHttpRequest();
        }
        catch(e)
        {
            xmlHttp = false;
        }
    }

    if(!xmlHttp)
        alert("Cant create that object");
    else
        return xmlHttp;
}

function process(x)
{
    alert(x);
    voteid=x;
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
    {
        //voterid = encodeURIComponent("710817");
        voterid =encodeURIComponent(document.getElementById(voteid).value);
        xmlHttp.open("GET","count.php?voterId="+voterid, true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
    }
    else
    {
        //setTimeout('process()', 1000);
    }
}

function handleServerResponse()
{
    if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200 )
        {



            message =xmlHttp.responseText;
            document.getElementById(voteid+"1").innerHTML = '<span style="color:blue">' + message + '</span>';
            //setTimeout('process()', 1000);
        }
        else
        {
            alert('Something Went Wrong!');
        }
    }
}
