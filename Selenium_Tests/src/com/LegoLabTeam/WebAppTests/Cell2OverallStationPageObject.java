package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;

/***
 * The page object for the cell 2 overall station
 * @author Zack Coker
 *
 */
public class Cell2OverallStationPageObject extends StationsForCell2PageObject{
	
	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell2OverallStationPageObject(WebDriver newDriver)
	{
		   super(newDriver,"Tiger Automotive Lab: Cell 2 Overall");
	}
}
