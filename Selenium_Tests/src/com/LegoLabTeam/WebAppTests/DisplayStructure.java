package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
/***
 * This is the parent object of the page objects. It handles loading pages in 
 * a consistent manner
 * @author Zack Coker
 *
 */
public class DisplayStructure {
    /***
     * This constructor creates a wait of 30 seconds and then 
     * checks for the title in the webpage every 2 seconds
     * @param title - the title to search for
     * @param driver - the web driver
     */
	public static void checkTitleLoaded(String title, WebDriver driver)
	  {
		  Wait<WebDriver> wait = new FluentWait<WebDriver>(driver)  
			         .withTimeout(30, TimeUnit.SECONDS)  
			         .pollingEvery(2, TimeUnit.SECONDS);  

			      wait.until(ExpectedConditions.titleIs(title));
	  }
}
