<?php

//create class right here
//import proper mathematical library cause why not?
//http://php.net/manual/en/book.math.php ->math library to use
//find a way to carry the functions to many places
//allows anyone to carry out various calculations
public String analysisName;
public double rate;
public double futureValue;
public double presentValue;
public double years;
public double netPresentValue;
public double initialOutlay;
public double depreciation;
public double principalAmount;

//ROCE VARIABLES for later use
public double avgProfit,totalProfit,avgInvestment,capitalCost,disposalCost,ROCE;
//NPV VARIABLES for later use
public int numOfYears;
public double resultPV;
public double totalOutflow;
public double totalInflow;


public Object input;
// constructor
//use if to do various calculations depending on method selected.
CostBenefit(String name,double discountingRate,double orgAmount){
	analysisName= name;
	rate= discountingRate/100;
	initialOutlay=orgAmount;

}
//Future Value Calculation method
public double calculateFV(double principalAmount,double discountingRate, double years ) {
	futureValue= principalAmount*(Math.pow((1+discountingRate/100), years));
	return futureValue;
}
//Present Value Calculation method

public double calculatePV(double principalAmount, double discountingRate,double years) {
	futureValue=calculateFV (principalAmount,discountingRate, years );
	presentValue= futureValue/((Math.pow((1+discountingRate/100), years)));
	echo(presentValue);
        return presentValue;


}

/*NPV calculation Method
 *
 *Use loops set to stop at max years given
 *Use rolling sum instead of storing values then adding later
 *This is a placeholder. Implementation Pending
 *PV calculations to use PV fucntion
 *Arrays would be useful here
 */


public double calculateNPV() {
	 //test years
     int yearsUsed = 4;

double [] cashin=new double[yearsUsed];//array to store cash inflows
double [] cashout= new double[yearsUsed];//array to store cash out flows
double[] pvInflow=new double[yearsUsed];//array to store PV of each in cash flow
double[] pvOutflow=new double[yearsUsed];//array to store PV of each out cash flow
 //input for cash flows in

 //z is just a counter
for (int z = 0 ; z < 4; z++ )
{
       echo("Input a cash inflow please");
	 //input thingo
}
//input for cash outflows
// b is just a counter
for (int b = 0 ; b < 4; b++ )
{
        echo("Input a cash ouflow please");
	 //more input thingoes
}
//calculating PV of cash flows in
//j is just a counter
//entering the rate
double r = 0;
for(int rc=0;rc<1;rc++)
 //rc is a counter to surpress the number of times the rate can be requested
    {
     echo("Please enter the rate to be used for PV");
     //more inputs

    }
for (int j = 0 ; j <4; j++ )
{
	for( int l=0; l<=3;l++)
		//l is a counter for years as they increase
	{

		principalAmount= cashin[l];
		rate=(r/100);
		years=l;
		resultPV =calculatePV( principalAmount,rate,years)  ;
		pvInflow[l]=resultPV;
	}
	 //  years will be increasing
}
//calculating PV of cash flows out
//k is just a counter
for (int k = 0 ; k < 4; k++ )
{
	for( int f=0; f<4;f++)
		//f is a counter for years as they increase
	{
		principalAmount=cashout[k];
		rate=(r/100);
		years=f;
		resultPV=calculatePV( principalAmount,rate,years)  ;
		pvOutflow[f]=resultPV;
	}
	//sum of total cash out flows
	for(double h:pvOutflow) {
		totalOutflow+= h;
	}
	//sum of total cash in flows
	for(double q: pvInflow) {
		totalInflow+= q;
	}
}
netPresentValue= totalOutflow-totalInflow;
return netPresentValue;
}


/*ROCE Calculation method
 *ROCE = average profit/ average investment
 * Average investment=capital cost+ Disposal cost/2
 *
 */

public double calculateROCE(double capitalcost,double disposalcost,double totalprofit,int years) //Add ability to take multiple loops of information input
{
	//integrate profit calculating loop
	// allow user input
	//all code commented below here was used in testing
	//echo("How many profits would you like to input?");
	//int profitcount = 4;
	//capitalcost;
	// disposalcost;
        //double[] profits=new double [3];
	//int count=4;

	/*for (int t=0;t<count;t++) {
		for (double s:profits) {

			totalProfit+=s;
		}
	*/
	avgProfit= totalProfit/years;
        /*
        for(int rc2=0;rc2<1;rc2++)
        {
            echo("What is the capital cost?");
            capitalCost=capitalcost.nextInt();
        }
        for(int rc3=0;rc3<1;rc3++)
        {
            echo("What about the disposal cost?");
            disposalCost=disposalcost.nextInt();
        }
        */
	avgInvestment= (capitalCost+disposalCost)/2;
	ROCE= avgProfit/avgInvestment;
	return ROCE;
    }



?>
