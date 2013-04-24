package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;
/***
 * This class is for stations that are navigated to from cell 2
 * @author Zack Coker
 *
 */
public class StationsForCell2PageObject extends StationDisplay{

	
	public StationsForCell2PageObject(WebDriver driver, String title, int stationNumber)
	{
		super(driver, title, stationNumber, 2);
	}
	
	/***
	 * This method defines how to go back to cell 2
	 */
	  public Cell2DisplayPageObject goBack()
	  {
		  StationDisplayStructure.clickBackButton(driver);
		  return new Cell2DisplayPageObject(driver);
	  }
}
