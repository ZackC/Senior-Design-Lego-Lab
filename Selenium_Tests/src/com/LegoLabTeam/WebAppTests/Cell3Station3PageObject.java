package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;

/***
 * The page object for cell 3 station 3
 * @author Zack Coker
 *
 */
public class Cell3Station3PageObject extends StationsForCell3PageObject{
	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell3Station3PageObject(WebDriver newDriver)
	{
        super(newDriver,"Tiger Automotive Lab: Cell 3 Station 3");
	}
}
