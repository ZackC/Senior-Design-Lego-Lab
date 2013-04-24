package com.LegoLabTeam.WebAppTests;

import java.lang.reflect.InvocationTargetException;
import java.util.List;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
/***
 * The class that handles the interaction with the web code for cell pages in a
 * consistent manner
 * @author Zack Coker
 *
 */
public class CellDisplayStructure extends DisplayStructure
{
	/***
	 * Navigaes to a station based on the class name
	 * @param driver - the webdriver
	 * @param stationDisplayClassToReturn - the class of the page object for the station 
	 * @param idString - the id string of something in the button
	 * @return - the station to get to.
	 * @throws Exception
	 */
	public static StationDisplay navigateToStation(WebDriver driver, Class<? extends StationDisplay> stationDisplayClassToReturn, int stationNumber)throws Exception
	{
	  returnButton(driver,stationNumber).click();
	  return stationDisplayClassToReturn.getDeclaredConstructor(WebDriver.class).newInstance(driver);

	}
	
	/***
	 * Returns a button object from the page
	 * @param driver - the webdriver
	 * @param idString - the id string of something in the button
	 * @return: the button on the web page
	 */
	public static WebElement returnButton(WebDriver driver, int buttonNumber)
	{
		List<WebElement> links = driver.findElements(By.tagName("a"));
		return links.get(buttonNumber+1);
		//return driver.findElement(By.id(idString)).findElement(By.xpath("ancestor::a"));
	}
	
	/***
	 * Checks that the text is in the button
	 * @param button - the button to check for the text
	 * @param text - the text to check for
	 * @throws Exception
	 */
	public static void checkTextIsInButton(WebElement button, String text) throws Exception
	{
		assertTrue(button.getText().contains(text));
	}
	
	/***
	 * Checks for the status in the button
	 * @param button - the button to check
	 * @param id- the id string of the status
	 * @throws Exception
	 */
			
	private static void checkButtonContainsStatus(WebElement button, String id) throws Exception
	{
	   assertTrue(button.findElement(By.id(id)).isEnabled());
	}
	
	/***
	 * Checks if the status object is in the button
	 * @param button - the button to check for
	 * @param stationNumber - the station number to check for
	 * @throws Exception
	 */
	public static void checkStatusIsInButton(WebElement button, int stationNumber) throws Exception
	{
	  if (stationNumber == 0)
	  {
	    checkButtonContainsStatus(button, "overallStatus");
	  }
	  else
	  {
	     checkButtonContainsStatus(button, "station"+stationNumber+"Status");
	  }
	}
	
	/***
	 * Handles clicking the back button
	 * @param driver - the web driver
	 */
	public static void clickBackButton(WebDriver driver)
	{
		driver.findElement(By.cssSelector("span.ui-btn-text")).click();
	}
}
