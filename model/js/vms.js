if(document.getElementById){
  doc = 'document.getElementById("';
  sty = '").style';
  htm = '';
}
if(document.layers){
  doc = 'document.';
  sty = '';
  htm = '.document';
}
if(document.all){
  doc = 'document.all.';
  sty = '.style';
  htm = '';
}
var currentX = 0;
var currentY = 200;
var inviteImageWidth = 163;
var docWidth, docHeight;
if (document.layers) { docWidth = window.outerWidth; docHeight = window.outerHeight; }
if (document.all) { docWidth = document.body.clientWidth; docHeight = document.body.clientHeight; }
var docXtop = docWidth - 163;
var xAnimationStep = 1;
var xAnimationEvery = Math.round(0.9 * (60000 / (docXtop * 2)));
if (xAnimationEvery < 10) {
  xAnimationEvery = 10;
  var numSteps = 60000 / xAnimationEvery;
  xAnimationStep = Math.round((docXtop * 2) / numSteps);
}
var xIncrementSaved = xAnimationStep;
var xIncrement = xIncrementSaved;
function animationStop() {
  animationDiv = eval(doc + 'theImage' + htm);
  animationDiv.innerHTML = '';
  rpc_setPersonMode('1');
}
function animationStep(){
  newX = currentX + xIncrement;
  if (xIncrement > 0) {
      if (newX < docXtop) {
          currentX = newX;
          animationDivSty.left = currentX;
          setTimeout('animationStep()', xAnimationEvery);
      } else {
          xIncrementSaved = -xIncrementSaved;
          xIncrement = xIncrementSaved;
          setTimeout('animationStep()', xAnimationEvery);
      }
  } else if (xIncrement < 0) {
      if (currentX > 0) {
          currentX = newX;
          animationDivSty.left = currentX;
          setTimeout('animationStep()', xAnimationEvery);
      } else {
          setTimeout('animationStop()', 3000);
      }
  } else {
      setTimeout('animationStep()', 1000);
  }
}
document.write('<div name="theImage" id="theImage" style="position: absolute; top: 200; left: 0; z-index: 999" align="right">');
document.write('&nbsp;</div>');
var animationDivSty = eval(doc + 'theImage' + sty);
vm_status = 1;
vm_img = new Image();
vm_img.onload = vm_check;
vm_poll();
function vm_poll() {
	vm_img.src = 'http://vm.boldchat.com/bh.vm?pp=10&aid=4130209666&cdid=1788282618&vid=2022000585&pvid=3701384115&kill=' + (new Date()).getTime() + '&referrer=' + escape(document.referrer) + '&url=' + escape(document.URL);
	setTimeout('vm_poll()', 10000);
}
function vm_check() {
	if (vm_img!=null) {
		newStatus =  vm_img.height;
		if (newStatus!=vm_status) {
		    vm_status = newStatus;
		    if (vm_status==2) {
                    vm_openChat();
                } else if (vm_status==4) {
                    vm_inviteToChat();
                }
		}
	}
}
function vm_openChat() {
	this.newWindow = window.open('http://vm.boldchat.com/chat/visitor.jsp?type=OIC&cdid=1788282618&vid=2022000585&pvid=3701384115', 'Chat', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=640,height=480'); this.newWindow.focus(); this.newWindow.opener = window;
}
function vm_inviteToChat() {
    xIncrementSaved = xAnimationStep;
    xIncrement = xIncrementSaved;
    currentX = 0; currentY = 200;
    animationDivSty.top = currentY; animationDivSty.left = currentX;
    document.animationDiv = eval(doc + 'theImage' + htm);
    document.animationDiv.innerHTML = '<a href="#" onClick="return vm_onInviteClick(event);" onMouseOver="vm_pause();" onMouseOut="vm_resume();"><img border="0" src="http://images.boldchat.com/ext/images/invite_btn1_orange_163x72.gif" width="163" height="72"></a>';
    setTimeout('animationStep()', 5000);
}
function vm_onInviteClick(event) {
    imgCloseX = currentX + 151;
    imgCloseY = currentY + 0;
    if (event.x >= imgCloseX && event.x < imgCloseX + 12 && event.y >= imgCloseY && event.y < imgCloseY + 12) {
        animationStop();
    } else {
        this.newWindow = window.open('http://vm.boldchat.com/chat/visitor.jsp?type=OIC&cdid=1788282618&vid=2022000585&pvid=3701384115', 'Chat', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=640,height=480'); this.newWindow.focus(); this.newWindow.opener = window; animationStop();
    }
    return false;
}
function vm_pause() {
    xIncrement = 0;
}
function vm_resume() {
    xIncrement = xIncrementSaved;
}
function rpc_setPersonMode(mode) {
    var p=new Array(3);
    p[0]='4130209666';
    p[1]='2022000585';
    p[2]=mode;
    rpc_execute('boldchat.web_chat_manager', 'setPersonMode', p, new Image());
}
function rpc_execute(name, method, params, rpcImg) {
   url = 'http://vm.boldchat.com/bh.irpc/' + name + '?m=' + method;
   for (i in params) {
       url += '&' + 'p' + i + '=' + params[i];
   }
   url += '&' + (new Date()).getTime();
   rpcImg.src = url;
}
