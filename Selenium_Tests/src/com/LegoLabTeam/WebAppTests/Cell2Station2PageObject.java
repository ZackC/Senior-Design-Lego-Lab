package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;

/***
 * The page object for cell 2 station 2
 * @author Zack Coker
 *
 */
public class Cell2Station2PageObject extends StationsForCell2PageObject{
	
	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
	public Cell2Station2PageObject(WebDriver newDriver)
	{
        super(newDriver,"Tiger Automotive Lab: Cell 2 Station 2",2);
	}

}
