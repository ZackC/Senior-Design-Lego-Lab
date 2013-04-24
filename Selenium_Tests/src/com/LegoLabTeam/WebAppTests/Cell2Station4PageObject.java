package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;

/***
 * The page object for cell 2 station 4
 * @author Zack Coker
 *
 */
public class Cell2Station4PageObject extends StationsForCell2PageObject{

	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell2Station4PageObject(WebDriver newDriver)
	{
        super(newDriver,"Tiger Automotive Lab: Cell 2 Station 4",4);
	}
}
