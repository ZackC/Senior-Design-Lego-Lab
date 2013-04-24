package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;
/***
 * The page object for cell 3 station 2
 * @author Zack Coker
 *
 */
public class Cell3Station2PageObject extends StationsForCell3PageObject{
	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell3Station2PageObject(WebDriver newDriver)
	{
        super(newDriver,"Tiger Automotive Lab: Cell 3 Station 2",2);
	}
}
