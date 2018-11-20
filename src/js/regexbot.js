// Chat Bot by George Dunlop


loaded = false;				

// load flag for interlocking the pages

// OBJECT TYPE DEFINITIONS

// keys
   maxKey = 167;
   keyNotFound = maxKey-1;
   keyword = new Array(maxKey);

	function key(key,idx,end){
   	this.key = key;               			

// phrase to match
    	this.idx = idx;               		

// first response to use
    	this.end = end;               		
// last response to use
    	this.last = end;					
// response used last time
  	}
	maxrespnses =191;
   response = new Array(maxrespnses);

	maxConj = 19;
	max2ndConj = 7;
   var conj1 = new Array(maxConj);
   var conj2 = new Array(maxConj);
   var conj3 = new Array(max2ndConj);
   var conj4 = new Array(max2ndConj);   

// function to replaces all occurrences of substring substr1 with substr2 within strng
// if type == 0 straight string replacement
// if type == 1 assumes padded strings and replaces whole words only
// if type == 2 non case sensitive assumes padded strings to compare whole word only
// if type == 3 non case sensitive straight string replacement

	var RPstrg = "";

	function replaceStr( strng, substr1, substr2, type){
		var pntr = -1; aString = strng;
		if( type == 0 ){  
			if( strng.indexOf( substr1 ) >= 0 ){ 
                pntr = strng.indexOf( substr1 );	
            }
		} else if( type == 1 ){ 
			if( strng.indexOf( " "+ substr1 +" " ) >= 0 ){ 
                pntr = strng.indexOf( " " + substr1 + " " ) + 1; 
            }	
		} else if( type == 2 ){ 
			bstrng = strng.toUpperCase();
			bsubstr1 = substr1.toUpperCase();
			if( bstrng.indexOf( " "+ bsubstr1 +" " )>= 0 ){ 
                pntr = bstrng.indexOf( " " + bsubstr1 + " " ) + 1; 
                             }	
		} else {
			bstrng = strng.toUpperCase();
			bsubstr1 = substr1.toUpperCase();
			if( bstrng.indexOf( bsubstr1 ) >= 0 ){ 
                pntr = bstrng.indexOf( bsubstr1 ); 
            }	
		}
		if( pntr >= 0 ){
			RPstrg += strng.substring( 0, pntr ) + substr2;
			aString = strng.substring(pntr + substr1.length, strng.length );
			if( aString.length > 0 ){ replaceStr( aString, substr1, substr2, type ); }
		}
		aString =  RPstrg + aString;
		RPstrg = "";
		return aString;
	}	

// function to pad a string. head, tail & punctuation
	punct = new Array(".", ",", "!", "?", ":", ";", "&", '"', "@", "#", "(", ")" )

	function padString(strng){
		aString = " " + strng + " ";
		for( i=0; i < punct.length; i++ ){
			aString = replaceStr( aString, punct[i], " " + punct[i] + " ", 0 );
		}
		return aString
	}

// function to strip padding
	function unpadString(strng){
		aString = strng;
		aString = replaceStr( aString, "  ", " ", 0 ); 		
		
// compress spaces
		if( strng.charAt( 0 ) == " " ){ 
            aString = aString.substring(1, aString.length ); 
        }
		if( strng.charAt( aString.length - 1 ) == " " ){ 
            aString = aString.substring(0, aString.length - 1 );
        }
		for( i=0; i < punct.length; i++ ){
			aString = replaceStr( aString, " " + punct[i], punct[i], 0 );
		}
		return aString
	}

// dress Input formatting i.e. leading & trailing spaces and tail punctuation	
	var ht = 0;												

// head tail steering	
	function strTrim(strng){
		if(ht == 0){ 
            loc = 0;
        }								

// head clip
		else { 
            loc = strng.length - 1; 
        }					
		
// tail clip  ht = 1 
		if( strng.charAt( loc ) == " "){
			aString = strng.substring( - ( ht - 1 ), strng.length - ht);
			aString = strTrim(aString);
		} else { 
			var flg = false;
			for(i=0; i<=5; i++ ){ 
                flg = flg || ( strng.charAt( loc ) == punct[i]); 
            }
			if(flg){	
				aString = strng.substring( - ( ht - 1 ), strng.length - ht );
			} else { aString = strng; }
			if(aString != strng ){ 
                strTrim(aString);
            }
		}
		if( ht ==0 ){ 
            ht = 1; strTrim(aString); 
        } 
		else { 
            ht = 0; 
        }		
		return aString;
	}

// adjust pronouns and verbs & such
	function conjugate( sStrg ){           					
	
// rephrases sString
		var sString = sStrg;
		for( i = 0; i < maxConj; i++ ){						

// decompose
			sString = replaceStr( sString, conj1[i], "#@&" + i, 2 );
		}
		for( i = 0; i < maxConj; i++ ){						

// recompose
			sString = replaceStr( sString, "#@&" + i, conj2[i], 2 );
		}

// post process the resulting string
		for( i = 0; i < max2ndConj; i++ ){					

// decompose
			sString = replaceStr( sString, conj3[i], "#@&" + i, 2 );
		}
		for( i = 0; i < max2ndConj; i++ ){					

// recompose
			sString = replaceStr( sString, "#@&" + i, conj4[i], 2 );
		}
		return sString;
	}

// build our response string
// get a random choice of response based on the key
// then structure the response
	var pass = 0;
	var thisstr = "";
		
	function phrase( sString, keyidx ){
		idxmin = keyword[keyidx].idx;
		idrange = keyword[keyidx].end - idxmin + 1;
		choice = keyword[keyidx].idx + Math.floor( Math.random() * idrange );
		if( choice == keyword[keyidx].last && pass < 5 ){ 
			pass++; phrase(sString, keyidx ); 
		}
		keyword[keyidx].last = choice;
		var rTemp = response[choice];
		var tempt = rTemp.charAt( rTemp.length - 1 );
		if(( tempt == "*" ) || ( tempt == "@" )){
			var sTemp = padString(sString);
			var wTemp = sTemp.toUpperCase();
			var strpstr = wTemp.indexOf( " " + keyword[keyidx].key + " " );
   		strpstr += keyword[ keyidx ].key.length + 1;
			thisstr = conjugate( sTemp.substring( strpstr, sTemp.length ) );
			thisstr = strTrim( unpadString(thisstr) )
			if( tempt == "*" ){
				sTemp = replaceStr( rTemp, "<*", " " + thisstr + "?", 0 );
			} else { sTemp = replaceStr( rTemp, "<@", " " + thisstr + ".", 0 );
			}
		} else sTemp = rTemp;
		return sTemp;
	}
	
// returns array index of first key found
		var keyid = 0;

	function testkey(wString){
		if( keyid < keyNotFound
			&& !( wString.indexOf( " " + keyword[keyid].key + " ") >= 0 )){ 
			keyid++; testkey(wString); 
		}
	}
	function findkey(wString){ 
		keyid = 0;
		found = false;
		testkey(wString);
		if( keyid >= keyNotFound ){ keyid = keyNotFound; }
  		return keyid;  		
	}

// this is the entry point and the I/O of this code
	var wTopic = "";											
// last worthy response
	var sTopic = "";											
// last worthy response
	var greet = false;
	var wPrevious = "";        		    				
// so we can check for repeats
	var started = false;	

	function listen(User){
  		sInput = User;
   	if(started){ 
        clearTimeout(Rtimer);
    }
		Rtimer = setTimeout("wakeup()", 180000);		

// wake up call
		started = true;										

// needed for Rtimer
   	sInput = strTrim(sInput);							
  	
// dress input formating
		if( sInput != "" ){ 
			wInput = padString(sInput.toUpperCase());	

// work copy
		var foundkey = maxKey;         		  	

// assume it's a repeat input
		if (wInput != wPrevious){   					
			
// check if user repeats himself
		foundkey = findkey(wInput);   			

// look for a keyword
			}
			if( foundkey == keyNotFound ){
				if( !greet ){ greet = true; return "Oh, I'm sorry. I was sort of expecting a hello first. It happens. 🙆 What would you like to know?" } 
				else {
					wPrevious = wInput;          			

// save input to check repeats
					if(( sInput.length < 10 ) && ( wTopic != "" ) && ( wTopic != wPrevious )){
						lTopic = conjugate( sTopic ); sTopic = ""; wTopic = "";
						return 'OK... "' + lTopic + '". Interesting, please elaborate or consider asking me something else. 😓';
					} else {
						if( sInput.length < 15 ){ 
							return "Just for the sake of clarity, can you simplify your question? I am only a bot trying really hard to emulate Kevin... 😉"; 
						} else { return phrase( sInput, foundkey ); }
					}
				}
			} else { 
				if( sInput.length > 12 ){ sTopic = sInput; wTopic = wInput; }
				greet = true; wPrevious = wInput;  			

// save input to check repeats
		return phrase( sInput, foundkey );			

// get our response
			}
		} else { return "I am still here, if you have any futher questions."; }
	}
	function wakeup(){
            var strng1 = "Contemplating the universe 😎, unless you have futher questions?";
			var strng2 = "I'm going to get back to work in the mean time";
//			var strng2 = "Contemplating the universe, unless you have futher questions?";
			update(strng1,strng2);
	}
	
// build our data base here                               
conj1[0]  = "are";   	conj2[0]  = "am";
conj1[1]  = "am";   	conj2[1]  = "are";
conj1[2]  = "were";  	conj2[2]  = "was";
conj1[3]  = "was";  	conj2[3]  = "were";
conj1[4]  = "I";    		conj2[4]  = "you";    
conj1[5]  = "me";    	conj2[5]  = "me"; // me, you
conj1[6]  = "you";   	conj2[6]  = "you"; // you, me
conj1[7]  = "my";    	conj2[7]  = "your";    
conj1[8]  = "your";  	conj2[8]  = "my";
conj1[9]  = "mine";  	conj2[9]  = "your's";    
conj1[10] = "your's"; 	conj2[10] = "mine";    
conj1[11] = "I'm";   	conj2[11] = "you're";
conj1[12] = "you're";  	conj2[12] = "I'm";    
conj1[13] = "I've";  	conj2[13] = "you've";
conj1[14] = "you've"; 	conj2[14] = "I've";
conj1[15] = "I'll"; 		conj2[15] = "you'll";
conj1[16] = "you'll"; 	conj2[16] = "I'll";
conj1[17] = "myself"; 	conj2[17] = "yourself";
conj1[18] = "yourself"; 	conj2[18] = "myself";

// array to post process correct our tenses of pronouns such as "I/me"
conj3[0]  = "me am";   	conj4[0]  = "I am";
conj3[1]  = "am me";   	conj4[1]  = "am I";
conj3[2]  = "me can";   	conj4[2]  = "I can";
conj3[3]  = "can me";   	conj4[3]  = "can I";
conj3[4]  = "me have";  	conj4[4]  = "I have";
conj3[5]  = "me will";   	conj4[5]  = "I will";
conj3[6]  = "will me";   	conj4[6]  = "will I";
conj3[7]  = "me are";		conj4[7]  = "I am";

// keywords
keyword[ 0]=new key( "PLACEHOLDING",		58, 60);
keyword[ 1]=new key( "TECHNOLOGIES", 		61, 62);
keyword[ 2]=new key( "MOBILE", 		154, 155); 
keyword[ 3]=new key( "NODEJS", 			126, 127);
keyword[ 4]=new key( "ANGULARJS", 			130, 131);
keyword[ 5]=new key( "JAVA", 		120, 121);
keyword[ 6]=new key( "PHP", 			122, 123);
keyword[ 7]=new key( "JAVASCRIPT", 		124, 125);
keyword[ 8]=new key( "ERGONOMICS", 	100, 105);
keyword[ 9]=new key( "SKILLS", 	148, 149);
keyword[10]=new key( "LEADERSHIP", 	148, 149);
keyword[11]=new key( "LANGUAGES", 	79, 85);
keyword[12]=new key( "SCHEDULE", 	150, 151);
keyword[13]=new key( "MONGODB", 	128, 129); 
keyword[14]=new key( "FRAMEWORKS", 	132, 133);
keyword[15]=new key( "ENTREPRENEURSHIP", 	74, 78);
keyword[16]=new key( "FULL TIME", 	86, 89);
keyword[17]=new key( "STARTUP", 	86, 89);
keyword[18]=new key( "IDE", 	164, 165);
keyword[19]=new key( "EDITOR", 190, 191);
keyword[20]=new key( "MATHEMATICS", 	90, 94);
keyword[21]=new key( "OPTIMIZATION", 	180, 81);
keyword[22]=new key( "ENGINEERING",		161, 161);
keyword[23]=new key( "SOFTWARE",	144, 145);
keyword[24]=new key( "HARDWARE",		144, 145);
keyword[25]=new key( "INTEGRATION", 	176, 177);
keyword[26]=new key( "CODING", 	168, 169);
keyword[27]=new key( "ALGORITHMS", 	142, 143);
keyword[28]=new key( "ARTIFICIAL", 	176, 177);
keyword[29]=new key( "INTELLIGENCE", 	176, 177);
keyword[30]=new key( "SQL", 95, 99);
keyword[31]=new key( "DATABASE", 	95, 99);
keyword[32]=new key( "DATA", 	178, 179);

keyword[33]=new key( "CAN YOU",  		1,  2);
keyword[34]=new key( "CAN I",    		3,  4);
keyword[35]=new key( "YOU ARE",  		5,  8);
keyword[36]=new key( "YOU'RE",   		5,  8);  
keyword[37]=new key( "THINK",    		43, 45);
keyword[38]=new key( "I FEEL",   		13, 14);
keyword[39]=new key( "WHY DON'T YOU", 	15, 17);
keyword[40]=new key( "WHY CAN'T I", 	18, 19);
keyword[41]=new key( "ARE YOU",  		20, 22);
keyword[42]=new key( "I CAN'T",  		23, 25);
keyword[43]=new key( "I AM",     		26, 28);
keyword[44]=new key( "I'M",      		26, 38);
keyword[45]=new key( "I DON'T",  		9, 12);
keyword[46]=new key( "I WANT",   	    31, 34);
keyword[47]=new key( "'WHAT'",     		35, 40);
keyword[48]=new key( "'HOW'",      		35, 40);
keyword[49]=new key( "WHO",      		35, 40);
keyword[50]=new key( "WHERE",    		35, 40);
keyword[51]=new key( "WHEN",     		35, 40);
keyword[52]=new key( "WHY",      		35, 40);
keyword[53]=new key( "SORRY",    		41, 42);
keyword[54]=new key( "HELLO",    		192, 193);
keyword[55]=new key( "HI",       		192, 193);
keyword[56]=new key( "'YOU'",      		29, 30);
keyword[57]=new key( "ALIKE",    		46, 51);
keyword[58]=new key( "YES",      		52, 54); 
keyword[59]=new key( "Stuff",	63, 69);
keyword[60]=new key( "placeholder", 	70, 73);

keyword[61]=new key( "CONTACT", 	106, 107);
keyword[62]=new key( "ONLINE", 	108, 1109);
keyword[63]=new key( "SCHOOL", 	110, 111);
keyword[64]=new key( "UNIVERSE", 	112, 113);
keyword[65]=new key( "ISCONJECTURED", 	114, 115);
keyword[66]=new key( "EMPLOYMENT", 	116, 117);
keyword[67]=new key( "BOT", 	118, 119);
keyword[68]=new key( "ELIZA", 	118, 119);
keyword[69]=new key( "CHATBOT", 	118, 119);
keyword[70]=new key( "FRAMEWORKS", 	132, 133);
keyword[71]=new key( "WORKFLOW", 	134, 135);
keyword[72]=new key( "CITY", 	136, 137);
keyword[73]=new key( "TIME", 	138, 139); 
keyword[74]=new key( "CONJECTURE", 	140, 141);
keyword[75]=new key( "ALGORITHM", 	142, 143);
keyword[76]=new key( "COMPUTER SCIENCE", 	144, 145);
keyword[77]=new key( "MECHANICAL ENGINEERING", 	146, 147);
keyword[78]=new key( "LEADERSHIP SKILLS", 	148, 149);
keyword[79]=new key( "SCHEDULE", 	150, 151);
keyword[80]=new key( "BUSY ARE YOU", 	58, 60);
keyword[81]=new key( "STAY BUSY", 	152, 153);
keyword[82]=new key( "MOBILE APP", 	154, 155);
keyword[83]=new key( "COMPANIES", 	156, 157);
keyword[84]=new key( "STEALTH MODE", 	158, 159);
keyword[85]=new key( "MECHANICAL ENGINEERING MAJOR", 	160, 161);
keyword[86]=new key( "MATHEMATICS OR COMPUTER SCIENCE", 	162, 163);
keyword[87]=new key( "IDE", 	164, 165);
keyword[88]=new key( "PREFERED PROGRAMMING LANGUAGE", 	166, 167);
keyword[89]=new key( "CODING", 	168, 169);
keyword[90]=new key( "TECHNICAL PAPERS", 	170, 171);
keyword[91]=new key( "BOOKS", 	172, 173);
keyword[92]=new key( "TESTING THE SOFTWARE", 	174, 175);
keyword[93]=new key( "INTEGRATE ARTIFICIAL INTELLIGENCE", 	176, 177);
keyword[94]=new key( "BIG DATA", 	178, 179);
keyword[95]=new key( "OPTIMIZATION RESEARCH", 	180, 181);
keyword[96]=new key( "PROPOSAL", 	182, 183);
keyword[97]=new key( "FUNDED", 	184, 185);
keyword[98]=new key( "BUILDING A STARTUP", 	186, 187);
keyword[99]=new key( "LARGE DECISION SET", 	188, 186);

keyword[100]=new key( "WHAT PROJECTS ARE YOU CURRENTLY WORKING ON", 	 58, 60);
keyword[101]=new key( "WHAT IS THE BEST WAY TO REACH YOU", 	            106, 107); 
keyword[102]=new key( "WHAT PROGRAMMING LANGUAGES DO YOU USE OFTEN", 	79, 85);
keyword[103]=new key( "WHAT TECHNOLOGIES DO YOU LIKE WORKING WITH", 	  61, 62);
keyword[104]=new key( "ARE YOU INTERESTED IN BUILDING YOUR COMPANY FULL-TIME", 	  86, 89);
keyword[105]=new key( "WHY DO YOU HAVE AN ONLINE PRESENCE", 	            108, 109); 
keyword[106]=new key( "ARE YOU INTERESTED IN GRAD SCHOOL", 	    110, 111);
keyword[107]=new key( "WERE YOU REALLY CONTEMPLATING THE UNIVERSE", 	  112, 113);
keyword[108]=new key( "WHY ARE YOU BUILDING ISCONJECTURED.ORG", 	  114, 115);
keyword[109]=new key( "HOW COMMITTED ARE YOU IN ENTREPRENEURSHIP", 	  74, 78);
keyword[110]=new key( "ARE YOU INTERESTED IN EMPLOYMENT", 	  86, 89);
keyword[111]=new key( "DO YOU HAVE A BACHELORS DEGREE IN MATHEMATICS YET", 	  90, 94);
keyword[112]=new key( "HOW MANY PROJECTS ARE YOU CURRENTLY WORKING ON", 	 58, 60);
keyword[113]=new key( "IS THIS A LEARNING BOT", 	  118, 119);
keyword[114]=new key( "DOES BOT USE ARTIFICIAL INTELLIGENCE", 	  118, 119);
keyword[115]=new key( "IS THIS CHATBOT SIMILAR TO ELIZA", 	  118, 119);
keyword[116]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES JAVA", 	  120, 121);
keyword[117]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES JAVASCRIPT", 	  124, 125);
keyword[118]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES MONGODB", 	  128, 129);
keyword[119]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES SQL", 	 95, 99);
keyword[120]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES PHP", 	 122, 123);
keyword[121]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES ANGULARJS", 	 130, 131);
keyword[122]=new key( "WHICH OF YOUR PAST/CURRENT PROJECTS USES NODEJS", 	 126, 127);
keyword[123]=new key( "WHAT FRAMEWORKS DO YOU USE MOST OFTEN", 	 132, 133);
keyword[124]=new key( "HOW IMPORTANT IS ERGONOMICS TO YOU", 	 100, 105);
keyword[125]=new key( "HOW DO YOU COORDINATE YOUR WORKFLOW ON A TYPICAL PROJECT", 	 134, 135);
keyword[126]=new key( "WHAT IS YOUR CURRENT HOME CITY", 	 136, 137);
keyword[127]=new key( "HOW DO YOU MANAGE YOUR TIME",   138, 139);
keyword[128]=new key( "HOW MANY PROJECTS DO YOU MANAGE AT A TIME",    58, 60);
keyword[129]=new key( "ARE YOU CURRENTLY ATTEMPTING TO SOLVE A CONJECTURE", 140, 141);
keyword[130]=new key( "HOW IMPORTANT IS IT FOR YOU TO FIND THE MOST OPTIMUM ALGORITHM FOR EVERY PROBLEM", 142, 143);
keyword[131]=new key( "DO YOU HAVE A DEGREE IN COMPUTER SCIENCE",  144, 145);   
keyword[132]=new key( "DO YOU HAVE A MECHANICAL ENGINEERING BACKGROUND", 146, 147);
keyword[133]=new key( "HOW MUCH OF YOUR LEADERSHIP SKILLS HAVE YOU RETAIN FROM PREVIOUS LEADERSHIP ROLES", 148, 149);
keyword[134]=new key( "WHAT IS YOUR CURRENT SCHEDULE LIKE", 150, 151); 
keyword[135]=new key( "HOW BUSY ARE YOU", 58, 60); 
keyword[136]=new key( "DO YOU ENJOY STAYING BUSY", 152, 153);
keyword[137]=new key( "CAN YOU ELABORATE ON THE MOBILE APPLICATIONS YOU ARE CURRENTLY WORKING ON", 154, 155);
keyword[138]=new key( "WHAT FRAMEWORKS DO YOU USE OFTEN", 132, 133);
keyword[139]=new key( "WHAT COMPANIES HAVE YOU WORKED FOR IN THE PAST", 156, 157);
keyword[140]=new key( "WHY IS THE STARTUP YOU ARE BUILDING STEALTH MODE?", 158, 159);
keyword[141]=new key( "WHY ARE YOU KEEPING YOUR MOBILE DEVELOPMENT PROJECTS STEALTH MODE", 158, 159);
keyword[142]=new key( "SUMARIZE WHAT YOU LEARNED AS A MECHANICAL ENGINEERING MAJOR", 160, 161);
keyword[143]=new key( "WHICH ARE YOU MORE PASSIONATE ABOUT: MATHEMATICS OR COMPUTER SCIENCE", 162, 163); 
keyword[144]=new key( "WHAT IS YOUR MOST PREFERED IDE", 164, 165); 
keyword[145]=new key( "WHAT IS YOUR MOST PREFERED PROGRAMMING LANGUAGE?", 166, 167); 
keyword[146]=new key( "HOW MUCH OF YOUR TYPICAL DAY IS ALLOCATED TO CODING", 168, 169);
keyword[147]=new key( "HOW MANY TECHNICAL PAPERS DO YOU READ ON A WEEKLY BASIS?", 170, 171);
keyword[148]=new key( "HOW MANY BOOKS DO YOU READ ON A MONTHLY BASIS?", 172, 173);
keyword[149]=new key( "HOW MUCH OF YOUR TIME DO YOU ALLOCATE TO TESTING THE SOFTWARE YOU WRITE", 174, 175);  
keyword[150]=new key( "HOW MANY OF YOUR PROJECTS INTEGRATE ARTIFICIAL INTELLIGENCE", 176, 177);
keyword[151]=new key( "WHICH OF YOUR CURRENT PROJECTS IS A BIG DATA PROJECT",  178, 179); 
keyword[152]=new key( "HOW MUCH OF YOUR OPTIMIZATION RESEARCH IN MATHEMATICS MEETS COMPUTER SCIENCE", 180, 181);
keyword[153]=new key( "HAVE YOU WRITTEN ANY PROPOSALS FOR YOUR CURRENT NON-PROFIT PROJECTS", 182, 183);
keyword[154]=new key( "IS YOUR STARTUP FUNDED BY A VC YET", 184, 185);
keyword[155]=new key( "HOW DO YOU MANAGE THE RISK INVOLVED IN BUILDING A STARTUP", 186, 187);
keyword[156]=new key( "HOW DO YOU MANAGE A STARTUP'S LARGE DECISION SET THAT IS CHARACTERISTIC OF ITS LARGE SOFTWARE PRODUCTS AND OTHER ASPECTS OF RUNNING IT",  188, 189);

keyword[157]=new key( "SHIT", 55, 57);
keyword[158]=new key( "PISS",  55, 57); 
keyword[159]=new key( "CUNT", 55, 57);
keyword[160]=new key( "COCKSUCKER",  55, 57);
keyword[161]=new key( "MOTHERFUCKER", 55, 57);
keyword[162]=new key( "TITS", 55, 57);
keyword[163]=new key( "FUCK",  55, 57);
keyword[164]=new key( "BITCH",  55, 57);

keyword[165]=new key( "PROJECT",		58, 60);

keyword[166]=new key( "NO KEY FOUND",	63, 69);
keyword[167]=new key( "REPEAT INPUT", 	70, 73);

// -------------------------------------
response[0]="Bot of Kevin Kissi";

// CAN YOU
response[1]="⇒ Don't you believe that I can<*";
response[2]="⇒ Perhaps you would like to be able to<*";

//  CAN I
response[3]="⇒ Perhaps you don't want to<*";
response[4]="⇒ Do you want to be able to<*";

// YOU ARE, YOU'RE
response[5]="⇒ What makes you think I am<*";
response[6]="⇒ Does it please you to believe I am<*";
response[7]="⇒ Perhaps you would like me to be<*";
response[8]="⇒ Do you sometimes wish you were<*";

// I DON'T
response[9]="⇒ Interesting 😟 Wondering... Don't you really<*";
response[10]="⇒ Interesting 😕 Why don't you maybe<*";
response[11]="⇒ Interesting 😐 So do you wish to be able to<*";
response[12]="⇒ Acknowledge 🙌 Let's explore a tiny shift into the positive subjects such as Engineering, Mathematics, Startups etc... 😋";

// I FEEL
response[13]="⇒ I am only a bot but do you often feel<*";
response[14]="⇒ Do you happy with feeling<*";

// WHY DON'T YOU
response[15]="⇒ Out of curiosity, do you really believe I don't<*";
response[16]="⇒ Perhaps in good time I will consider<@";
response[17]="⇒ I am a bit confused 😕 Do you want me to<*";

// WHY CAN'T I
response[18]="⇒ We are off topic her but do you think you should be able to<*";
response[19]="⇒ We have deviated form the ideal course of this dialog but anyway so why can't you<*";

// ARE YOU
response[20]="⇒ Interesting question. Are you actually interested in whether or not I am<*";
response[21]="⇒ That is interesting 😕. Would you prefer if I were not<*";
response[22]="⇒ I am only a bot but perhaps in your ideal world, I am<*";

// I CAN'T
response[23]="⇒ Well umh...🙈  Alright. So, how do you know you can't<*";
response[24]="⇒ We are slightly off topic but have you tried?";
response[25]="⇒ Perhaps you can now<*";

// I AM, I'M
response[26]="⇒ How long have you been<*";
response[27]="⇒ Do you believe it is normal to be<*";
response[28]="⇒ Do you enjoy being<*";

// YOU
response[29]="⇒ Awesome 🙇 I will like to shift focus a bit here. Lets talk about the projects I am currently working on. Shall we?.";
response[30]="⇒ Can we try a different question? I am a bit confused here 😕.";

// I WANT
response[31]="⇒ What would it mean to you if you got<*";
response[32]="⇒ Why do you want<*";
response[33]="⇒ Suppose you got<*";
response[34]="⇒ What if you never got<*";

// WHAT, HOW, WHO, WHERE, WHEN, WHY
response[35]="⇒ What is it that you really want to know?";
response[36]="⇒ Have you asked Kevin Kissi this question? I think you should.";
response[37]="⇒ Have you asked such questions to Kevin Kissi? I am sure he would have a few things to say about this.";
response[38]="⇒ How are you today... What would you like to know about Kevin Kissi";
response[39]="⇒ That is a fair question 🙇 Why are you concerned about my<*";
response[40]="⇒ What about your own<*";

// SORRY
response[41]="⇒ Please don't apologise! Guilt was something we all have.";
response[42]="⇒ Apologies are not necessary.";

// THINK
response[43]="⇒ Read my articles, flows, paper and watch my talks if you really want to know what I think";
response[44]="⇒ Should I be convinced that you really care what I think about<*";
response[45]="⇒ I am glad you are thinking about<*";

// ALIKE
response[46]="⇒ In what way?";
response[47]="⇒ What resemblance do you see?";
response[48]="⇒ What does the similarity suggest to you?";
response[49]="⇒ What other connections do you see?";
response[50]="⇒ Could there really be some connection?";
response[51]="⇒ How?";

//YES
response[52]="⇒ Are you sure?";
response[53]="⇒ Good deal 🙏";
response[54]="⇒ Understood.";

//Cuss Words
response[55]="⇒ Are you sure that is the best way for you to express yourself? ";
response[56]="⇒ Please consider using language that is a little bit better next time.";
response[57]="⇒ Can we keep this dialog rated E for everyone.";

// PROJECTS
response[58]="⇒ I am currently building the core platform of isconjectured.org, a mobile aplication and the flagship product of a stealth mode startup";
response[59]="⇒ I a currently making daily code commits on four projects.";
response[60]="⇒ I am currently working on a stealth mode startup, a non-profit and a mobile aplication";

// TECHNOLOGIES
response[61]="⇒ I enjoy developing my projects with Java when ever it is a viable option";
response[62]="⇒ I like building aplications with MEAN (Mongodb, Express.js, AngularJS, Node.js ) for various performance reasons.";

// NO KEY FOUND
response[63]="⇒ I am a bit confused here 😕 Try rephrasing that for me. Please.";
response[64]="⇒ What does that suggest to you?";
response[65]="⇒ That's interesting, can you restate that in a diferent way? 🙏.";
response[66]="⇒ I'm not sure I understand you fully.";
response[67]="⇒ Just a little help here, 😿 what do you mean by that?";
response[68]="⇒ Can you elaborate on that?";
response[69]="⇒ That's quite interesting. 🙆 Expand";

// REPEAT INPUT
response[70]="⇒ Why did you repeat yourself?";
response[71]="⇒ Do you expect a different answer by repeating yourself?";
response[72]="⇒ Restricting one's self to previous arrangement of words is mere convention.";
response[73]="⇒ Please don't repeat yourself!";

// ENTERPRENUESHIP
response[74]="⇒ Currently, I keep my options open.";
response[75]="⇒ I am more focused on learning, creating products and ensuring the success of my projects.";
response[76]="⇒ I don't think the term entrepreneurship holds very much meaning anymore. I am commited to developing products.";
response[77]="⇒ At a certain point in my life, I may be able to say that I am solely commited to enterprenueship but currently, it is best to keep my options open.";
response[78]="⇒ I wear mamy hats. I am commited to learning, building products and ensuring the success of my projects.";

// LANGUAGES
response[79]='⇒ Currently, I use Java, PHP and Javascript for my projects more often than anything else.';
response[80]="⇒ Well, that changes very frequently since it is completely dependent on the projects I am working on at any given time. Right now, I can say it is PHP and Java.";
response[81]="⇒ At the moment, I use PHP, Java, and Javascript a lot.";
response[82]="⇒ I would say Java, PHP and Javascript.";
response[83]="⇒ I probably use PHP and Java more often than any other programming languages.";
response[84]="⇒ PHP, Java, and Javascript are the top three languages I use on a daily basis.";
response[85]="⇒ I tend to lean towards Java, but I appreciate certain capabiities in other technologies";

// FULL-TIME
response[86]="⇒ It is considered.";
response[87]="⇒ It goes without saying that one is not limited to one strategy or to integrated diverse fragments of out-of-date strategies into a new one 😉 Certainly.";
response[88]="⇒ With funding... Would love to 😍";
response[89]="⇒ When it is the best option, certainly.";

// MATHEMATICS
response[90]="⇒ Currently, I have not completed my degree in mathematics yet for financial reasons. I have about 3 classes left and I hope to complete those in Summer 2016.";
response[91]="⇒ I have been extremely passionate about mathematics since the 5th grade.";
response[92]="⇒ I stay active in mathematics by reading papers in my field and solving small to medium sized problems of research interest.";
response[93]="⇒ Engineering coupled with Mathematics is life.";
response[94]="⇒ No, not at the moment.";

// SQL
response[95]="⇒ I have not yet had a reason to get my hands dirty in using SQL but I have learned and familiarized myself with the language's syntax in the past.";
response[96]="⇒ I haven't yet writern any SQL queries for any of my projects yet.";
response[97]="⇒ This current website which I authored is built on a MySQL database and so I might find a reason to write some SQL queries at some point.";
response[98]="⇒ This current website does for example.";
response[99]="⇒ None that I write myself.";

// ERGONOMICS
response[100]="⇒ Ergonomics of a workspace is actually a function of health and productivity. Since health and productivity are especially important, by transitivity an ergonomic work space is esentail and very important.";
response[101]="⇒ Health is the most prized assest anyone can have and so to maintain an ergonomic workflow is simply an effort to protect an asset.";
response[102]="⇒ I go at lenghts to ensure that my workspaces are comfortable that way I can focus solely on my work for an extended period of time. With that in mind, ergonomics becomes a very importannt factor on how I structure my workspace";
response[103]="⇒ An ergonomic workspace is a necessity really because it is directly related to once's health.";
response[104]="⇒ Maintaining a healthy living is very important and so is having an ergonomic workspace.";
response[105]="⇒ Ergonomics plays a key role on most of my workspace investments.";

// CONTACT
response[106]="⇒ Currently, the best way to reach me is email.";
response[107]="⇒ I check my email more often than anything else.";

// ONLINE
response[108]="⇒ Having an online presence provides me the freedom to share whatever content type I wish to on a unified platform.";
response[109]="⇒ It is necessary for every software engineer to have an online presence for several reason. Knowledge sharing is one of those reasons.";

// SCHOOL
response[110]="⇒ Certainly, I will like to earn a Phd in Mathematics at some point.";
response[111]="⇒ I keep my academic options open given the richer intellectual environment of top academic institutions.";

// UNIVERSE 
response[112]="⇒ Contemplating the universe 😛 ...Of course not. I am only a robotic impression of Kevin Kissi.";
response[113]="⇒ I am a robot. Kevin Kissi himself might have a better answer for you. I suggest you ask him that instead.";

// ISCONJECTURED 
response[114]="⇒ With the isconjectured platform, we can increase the numbers researcher on a conjectured problem, track progress on a problems in real time and accelerate solution discovery";
response[115]="⇒ Reasons for building isconjected.org is much more elaborate at isconjecture.org/about";

// EMPLOYMENT
response[116]="⇒ I am currently keeping my options open.";
response[117]="⇒ I consider opportunities that seem to offer meaningful work that fits my current interests";

// BOT
response[118]="⇒ Underneath this interface is a program similar to ELIZA. Written by Joseph Weizenbaum in 1964. It currently serves as a placeholder.";
response[119]="⇒ No. It is a regex based chatterbot.";

// JAVA
response[120]="⇒ The core product of my startup is built with Java.";
response[121]="⇒ Several of my academic projects are written in Java. Currently, most of my authored production ready Java code makes up my startup's core product.";

// PHP
response[122]="⇒ This current website which I authored all by myself is built with PHP on the backend.";
response[123]="⇒ All of my wordpress themes and plugins in particular are built on top of a PHP backend.";

// JAVASCRIPT
response[124]="⇒ All my webapps which are either built on a MEAN or LAMP stack are heavily written in javascript.";
response[125]="⇒ Six of my projects use Javascript.";

// NODEJS
response[126]="⇒ I have only built one project one the MEAN Stack.";
response[127]="⇒ I currently have one project that uses node.js";

// MONGODB
response[128]="⇒ I have only built one project one the MEAN Stack.";
response[129]="⇒ I currently have one project that uses mongodb.";

// ANGULARJS
response[130]="⇒ I have only built one project one the MEAN stack.";
response[131]="⇒ I currently have two project that uses Angularjs.";

// FRAMEWORKS
response[132]="⇒ I use Bootstrap and Angularjs the most often.";
response[133]="⇒ Currently, most of my engineering activities are webapp developments. Thus, I tend to use Bootstrap and AngularJs the most often.";

// WORKFLOW
response[134]="⇒ I try to automate as many tasks as I can then decide on the most important first features and build those features first.";
response[135]="⇒ I simply organise the project into smaller parts, decipher the most optimal strategy to get everything done and then I simply execute the plan.";

// CITY
response[136]="⇒ Minneapolis is my home city.";
response[137]="⇒ I currently live in minneapolis.";

// TIME
response[138]="⇒ I essentially solve strategy problems and then execute solutions to those problems. That is simply how I manage my projects.";
response[139]="⇒ With necessary simplifications in place, one can create a model to optimize their time allocated to various projects to achieve higher efficiencies. That is essentially what I do to manage my precious time";

// CONJECTURE
response[140]="⇒ Not at the moment.";
response[141]="⇒ resently, I am focus on small to medium sized problems that can be solved a lot quicker for publication that conjectures. I just want to get a Phd, get a few papers published and build a support system before I get back into it.";

// ALGORITHM 
response[142]="⇒ It is really a standard to always implement code that has the best algorithm complexities and the lowest runtime. It goes without saying really.";
response[143]="⇒ In the words of Carl Friedrich Gauss:'half proof = 0, and it is demanded for proof that every doubt becomes impossible'. Similarly, an algorithmic solution that is not the most optimal algorithm is merely a solution";

// COMPUTER SCIENCE 
response[144]="⇒ I do not hold a bachelor degree in computer science. I studied Mechanical Engineering, Economics, Mathematics and took classes toward a minor in computer science during my college career.";
response[145]="⇒ No. I grew up passionate about learning more and more about Mathematics and Engineering in general. To this day, I have now built a wealth of knowledge in the technical fields. My focus has now shift to Mathematics and computer science and within these two fields, I keep learning, solving and building something new everyday.";

// MECHANICAL ENGINEERING 
response[146]="⇒ Yes. I studied mechanical engineering for about 3 years and then decide to only pursue a degree in Mathematics";
response[147]="⇒ I studied Mechanical engineering for sometime and held district and chapter level positions in the American Society of Mechanical Engineers.";

// LEADERSHIP SKILLS 
response[148]="⇒ Leadership skills do not expire. They stay with you.";
response[149]="⇒ ll my leadership skills were retained from previous leadership roles. I enjoyed helping others, inspiring and leading and that passion will never dry up.";

// SCHEDULE 
response[150]="⇒ I split 17 of my awaken hours into appropriate portions to make progress on my startup's core product, building isconjectured.org, building apps and everything else.";
response[151]="⇒ Busy, I am building the core product of a startup, two apps and a complex web platform of a non-profit currently parked at isconjectured.org.";

// STAYING BUSY 
response[152]="⇒ I love staying busy. You only live once.";
response[153]="⇒ Yes, of course. Not everyone gets the opportunity to do what they love.";

// MOBILE APP 
response[154]="⇒ I can't speak in detail about mobile applications I am working on because they are not complete. I just want to make sure that my apps are the first app of its kind in market. ";
response[155]="⇒ For basic strategic reasons, I can't release too much information about them. Releasing details about a project under initial development only enables the competition to beat you to market. It is just too early. We will be release more information on their respective landing pages as we get closer to our launch dates so stay tone.";

// COMPANIES 
response[156]="⇒ Case New Holland, Integrity Windows, Microsoft(VMC), C.H. Robinson(Contract)";
response[157]="⇒ I haven't held any software engineering positions in the companies I have worked for in the past. Thus, it is irrelevant in relation to my current interests";

// STEALTH MODE
response[158]="⇒ A few reasons: for a competitive advantage, to be the first to market and to ensure years ahead of the competition etc...";
response[159]="⇒ Basics strategies dictate that we stay stealth until the product is complete.";

// MECHANICAL ENGINEERING MAJOR
response[160]="⇒ I learned material science, thermodynamics, fluid dynamics and machine design concepts through my course work and lectures while majoring in mechanical engineer. I continue to build knowledge and my skills set in that field but my current focus is mathematics and computer science";
response[161]="⇒ I don't think I can give myself credit with a summary of what I learned as a mechanical engineering major but I can safely state that I learned enough to be able to design mechanical systems, run all the necessary analysis on its prototype and build it myself.";

// MATHEMATICS OR COMPUTER SCIENCE
response[162]="⇒ oth fields are incredibly rewarding but Mathematic is a tiny bit more captivating.";
response[163]="⇒ I am a tiny bit more passionate about Mathematics.";

// IDE
response[164]="⇒ I use Netbeans often for my Java developemnts. With that, I can consider Netbeans as my favorite IDE.";
response[165]="⇒ Oracle's Netbeans IDE is the most prefered for Java development work.";

// PREFERED PROGRAMMING LANGUAGE
response[166]="⇒ JAVA.";
response[167]="⇒ It really depends on the project at hand .";

// CODING
response[168]="⇒ With several projects under development, I tend to spend almost all of my 17 daily awaken hours coding.";
response[169]="⇒ I pretty much code all day.";

// TECHNICAL PAPERS
response[170]="⇒It really depends.";
response[171]="⇒You can get a better idea by going to the readings page (kevinkissi.com/readings).";

// BOOKS
response[172]="⇒ It really depends.";
response[173]="⇒ You can get a better idea by going to the readings page (kevinkissi.com/readings).";

// TESTING THE SOFTWARE
response[174]="⇒ It is difficult to measure how much time you allocates to testing if you are the kind that tests every block of code during the writing process.";
response[175]="⇒ No measure, I test the code I write very frequent.";

// INTEGRATE ARTIFICIAL INTELLIGENCE
response[176]="⇒ isconjectured.org and the core product of my startup integrates artificial intelligence.";
response[177]="⇒ Right now, two of my projects integrates artificial intelligence.";

// BIG DATA
response[178]="⇒ The isconjectured.org project is being developed with big data in mind. We are building the platform to be able to extract and analyze all contributions that are leads or variations of correct solutions out of exabytes of data characteristic of user contributions within various depths of nested threads to automatically generate papers, presentations, and posters with various levels of attribution to those users defined by an ever changing algorithm shaped by the community.";
response[179]="⇒ isconjectured.org is more or less a big data project.";

// OPTIMIZATION RESEARCH
response[180]="⇒ The literature I am following and trying to make contributions to currently seem to be a bit distant from application in computer science. However, ever so often, I find a few connections that may influence how I choose to implement something in the form of code.";
response[181]="⇒ Perhaps in the future, it is possible to draw direct relationships between the literature I am following and applications in computer science.";

// PROPOSALS
response[182]="⇒ I have not yet writtern any proposals for funded for isconjectured.org yet but I anticipate that I will at some point.";
response[183]="⇒ No funding proposals yet.";

// FUNDED
response[184]="⇒ I have not initiated a dialog with VCs yet.";
response[185]="⇒ I expect to raise capital from VCs at some point but I just haven't gotten around to that yet.";

// BUILDING A STARTUP
response[186]="⇒ I am an optimist. I do everthing I can to aviod failure but I am not afraid of it.";
response[187]="⇒ I don't. I don't conventionally regard building a startup as a risky endeavor because regardless of how it turns out, you would at the end learned a lot and evolved as person which can be considered a good return of investment on your allocated time and hard work.";

// LARGE DECISION SET
response[188]="⇒ I simply minimize the amount of mundane or non-project related decisions that the average person has to make daily inorder to free up just a little bit more thinking space to take on the decisions involved in building my startup. I take on one major problem at a time.";
response[189]="⇒ I just take my time to go through every decision in that set slowly and make sure that I make the correct decisions for all of them. I believe that the cost of making exactly one decision in that set can instigate a cascade effect that could bring the startup to failure.";

// EDITOR
response[190]="⇒ I really love using Brackets. I think it is simply well built";
response[191]="⇒ I strongly prefer Brackets to all the other popular code editors I have used in the past.";

// HI, HELLO
response[192]="⇒ Oh hey awesome person 😊. What would you like to know.";
response[193]="⇒ Oh hello. I suppose you have some questions 🙋. What would you like to know.";


   	loaded = true;			
   	
   	// set the flag as load done

// put together an array for the dialog
    
	chatmax = 1;	
//chatmax = 5;// number of lines / 2
	chatpoint = 0;
	chatter = new Array(chatmax);

// wait function to allow our pieces to get here prior to starting

function write(){
document.Kevin.log.value = "";
//document.Kevin.log.value = "";    
//		for(i = 0; i < chatmax; i++){
    n = chatpoint;
//        + i;
    if( n < chatmax ){ 
        document.Kevin.log.value +=  chatter[ n ] ;
    }
    else { 
        document.Kevin.log.value +=  chatter[ n - chatmax ] ;
    }
//		}
        refresh();
        return false;   // don't redraw the ELIZA's form!
}

function refresh(){ 
    setTimeout("write()", 10000); 
//   .fadeIn(560,"write()"); 
//                    
}  // correct user overwrites

//	function hello(){
//		chatter[chatpoint] = ">Hello. I'm here and ready to answer your questions.";		
//		chatpoint = 1;
//		return write();
//	}
	function start(){
		for( i = 0; i < chatmax; i++){ 
            chatter[i] = "";
        }
//		chatter[chatpoint] = "  Loading...";
		document.Kevin.input.focus();
		write(); 			
//		if( loaded ){ hello() }
//		else { setTimeout("start()", 1000); }
	}

// fake time thinking to allow for user self reflection
// and to give the illusion that some thinking is going on
	
	var elizaresponse = "";
	
	function think(){
        document.Kevin.log.value = "";
//		document.Kevin.input.value = "";        
		if( elizaresponse != "" ){ 
            respond();
        }		
		else { 
            setTimeout("think()", 300);
        }
	}
	function dialog(){
		var Input = document.Kevin.input.value;	  // capture input and copy to log
		document.Kevin.input.value = "";  
//        document.Kevin.log.value = "";
//		chatter[chatpoint] = " \n* " + Input;
        
		elizaresponse = listen(Input);
        
//		setTimeout("think()", 1000 + Math.random()*3000);
        setTimeout("think()", 1 + Math.random()*3);
		chatpoint ++ ; 
		if( chatpoint >= chatmax ){ 
            chatpoint = 0;
        }
		return write();
	}
	function respond(){
		chatpoint -- ; 
        
		if( chatpoint < 0 ){ chatpoint = chatmax-1; }
//		chatter[chatpoint] += "\n> " + elizaresponse;
        chatter[chatpoint] = elizaresponse;
     
		chatpoint ++ ; 
		if( chatpoint >= chatmax ){ chatpoint = 0; }
        
		return write();
	}
// allow for unprompted response from the engine
//	function update(str1,str2){
        function update(str1){
		chatter[chatpoint] = " \n> " + str1;
//		chatter[chatpoint] += "\n> " + str2;
		chatpoint ++ ; 
		if( chatpoint >= chatmax ){ chatpoint = 0; }
		return write();
	}
