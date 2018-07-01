/* ---------------------------
   John Paxton
   November 3, 2006
   verify.js
   ----------------------------
   A collection of functions to perform
   some simple, client-side data checks.
   ----------------------------
*/

// ----------------------------

function isBlank (word)
{
  if (word == null || word == "")
  {
    return true;
  }
  for (var i = 0; i < word.length; i++)
  {
    var c = word.charAt(i);
    if ((c != ' ') && (c != '\n') && (c != '\t'))
    {
      return false;
    }
  }
  return true;
}

// ----------------------------

function checkBlank (element)
{
  if (isBlank(element.value))
  {
    alert(element.description + " can not be blank ");
    return true;
  }
  return false;
}

// ----------------------------

function isAlpha (word)
{
  for (var i = 0; i < word.length; i++)
  {
    var c = word.charAt(i);
    if (!((c >= 'a' && c <= 'z') ||
	  (c >= 'A') && (c <= 'Z')))
    {
      return false;
    }
  }
  return true;
}

// ----------------------------

function checkAlpha (element)
{
  if (!isAlpha(element.value))
  {
    alert(element.description + " must consist of a-z,A-Z only");
    return false;
  }
  return true;
}

// ----------------------------

function checkEmail(element)
{
  // Format vorne@hinten.endung
//  var regEmail = /^\w+@\w+\.\w\w+$/;
  var regEmail =/^\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,4}$/;
  if(element.value.search(regEmail)==-1)
  {alert(element.description + " is not a valid Email address");
    return false;
  }
  return true;
}

// ----------------------------

function verify (form)
{
  for (var i = 0; i < form.length; i++)
  {
    element = form.elements[i];
    if (element.type == "text"||element.type == "password")
    {
      if (element.isMandatory && checkBlank(element))
      {
        return false;
      }
      if (element.isAlpha && !checkAlpha(element))
      {
	return false;
      }
      if (element.isEmail &&!checkEmail(element))
      {
        return false;
      }
      if (element.value.length<element.minLength)
      {
        alert(element.description + ": Your Password is not long enough.");
        return false;
      }

   }
  }
  return true;
}