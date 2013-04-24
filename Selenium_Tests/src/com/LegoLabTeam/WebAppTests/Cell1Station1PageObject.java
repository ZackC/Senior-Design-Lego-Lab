package com.LegoLabTeam.WebAppTests;

import org.openqa.selenium.WebDriver;

/***
 * The page object for cell 1 station 1
 * @author Zack Coker
 *
 */
public class Cell1Station1PageObject extends StationsForCell1PageObject 
{

	/***
	 * uses the super constructor to verify the title of the page this constructor 
	 * provides
	 * @param newDriver - the web driver
	 */
   public Cell1Station1PageObject(WebDriver newDriver)
   {
	   super(newDriver,"Tiger Automotive Lab: Cell 1 Station 1",1);
   }
}
