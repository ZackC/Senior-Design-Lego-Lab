package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;
/***
 * The page object for the overall station display of cell 3
 * @author Zack Coker
 *
 */
public class Cell3OverallStationPageObject extends StationsForCell3PageObject{
	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell3OverallStationPageObject(WebDriver newDriver)
	   {
		   super(newDriver,"Tiger Automotive Lab: Cell 3 Overall");
	   }
}
