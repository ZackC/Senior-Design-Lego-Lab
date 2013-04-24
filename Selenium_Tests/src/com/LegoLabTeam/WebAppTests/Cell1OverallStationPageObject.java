package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;

/***
 * The page object for the overall station of cell 1
 * @author Zack Coker
 *
 */
public class Cell1OverallStationPageObject extends StationsForCell1PageObject{

	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell1OverallStationPageObject(WebDriver newDriver)
	   {
		   super(newDriver,"Tiger Automotive Lab: Cell 1 Overall",0);
	   }
}
